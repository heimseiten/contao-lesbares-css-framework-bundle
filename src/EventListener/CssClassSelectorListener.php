<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Database;
use Contao\DataContainer;
use Contao\Input;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\StringUtil;
use Heimseiten\ContaoLesbaresCssFrameworkBundle\Parser\CssClassParser;

class CssClassSelectorListener
{
    public function __construct(
        private readonly CssClassParser $parser,
        private readonly bool $loadBuiltinCss = true,
    ) {
    }

    /**
     * Inject the selector field right before "cssID" into every palette of the
     * table that has a cssID field (so it appears for all element types).
     */
    #[AsCallback(table: 'tl_content', target: 'config.onload')]
    #[AsCallback(table: 'tl_article', target: 'config.onload')]
    public function injectField(DataContainer $dc): void
    {
        $table = $dc->table;

        if (empty($GLOBALS['TL_DCA'][$table]['palettes'])) {
            return;
        }

        foreach ($GLOBALS['TL_DCA'][$table]['palettes'] as $name => $palette) {
            if ('__selector__' === $name || !\is_string($palette)) {
                continue;
            }

            if (str_contains($palette, 'cssID') && !str_contains($palette, 'cssFrameworkClasses')) {
                $GLOBALS['TL_DCA'][$table]['palettes'][$name] = str_replace(',cssID', ',cssFrameworkClasses,cssID', $palette);
            }
        }
    }

    /**
     * Load the small backend script that keeps the cssID class field in sync
     * with the selection live (before saving).
     */
    #[AsCallback(table: 'tl_content', target: 'config.onload')]
    #[AsCallback(table: 'tl_article', target: 'config.onload')]
    public function addBackendScript(): void
    {
        $script = 'bundles/heimseitencontaolesbarescssframework/backend-css-sync.js';

        if (!\in_array($script, $GLOBALS['TL_JAVASCRIPT'] ?? [], true)) {
            $GLOBALS['TL_JAVASCRIPT'][] = $script;
        }
    }

    /**
     * @return array<string, array<string, string>>
     */
    #[AsCallback(table: 'tl_content', target: 'fields.cssFrameworkClasses.options')]
    #[AsCallback(table: 'tl_article', target: 'fields.cssFrameworkClasses.options')]
    public function getOptions(): array
    {
        return $this->parser->getGroupedOptions();
    }

    /**
     * Show the framework classes that are currently set on the element's cssID.
     *
     * @return list<string>
     */
    #[AsCallback(table: 'tl_content', target: 'fields.cssFrameworkClasses.load')]
    #[AsCallback(table: 'tl_article', target: 'fields.cssFrameworkClasses.load')]
    public function loadFromCssId(mixed $value, DataContainer $dc): array
    {
        if (!$dc->activeRecord) {
            return [];
        }

        $cssID = StringUtil::deserialize($dc->activeRecord->cssID);
        $classes = \is_array($cssID) ? array_filter(explode(' ', (string) ($cssID[1] ?? ''))) : [];

        return array_values(array_intersect($classes, $this->parser->getAllClasses()));
    }

    /**
     * Merge the selected classes into the element's cssID class field.
     */
    #[AsCallback(table: 'tl_content', target: 'fields.cssFrameworkClasses.save')]
    #[AsCallback(table: 'tl_article', target: 'fields.cssFrameworkClasses.save')]
    public function saveToCssId(mixed $value, DataContainer $dc): mixed
    {
        if (!$dc->activeRecord) {
            return $value;
        }

        $all = $this->parser->getAllClasses();
        $selected = array_values(array_intersect(StringUtil::deserialize($value, true), $all));

        $name = 'cssID'.('editAll' === Input::get('act') ? '_'.$dc->id : '');
        $cssID = Input::post($name);

        if (null === $cssID) {
            $cssID = StringUtil::deserialize($dc->activeRecord->cssID);
        }

        if (!\is_array($cssID)) {
            $cssID = ['', ''];
        }

        $classes = array_filter(explode(' ', (string) ($cssID[1] ?? '')));
        $classes = array_diff($classes, $all);          // drop previously set framework classes
        $classes = array_merge($classes, $selected);    // add the current selection
        $classes = array_values(array_unique(array_filter($classes)));

        $cssID[1] = trim(implode(' ', $classes));

        // Update the posted value (Contao saves cssID afterwards) and persist directly
        Input::setPost($name, $cssID);
        $dc->activeRecord->cssID = serialize($cssID);
        Database::getInstance()
            ->prepare("UPDATE {$dc->table} SET cssID=? WHERE id=?")
            ->execute(serialize($cssID), $dc->id)
        ;

        return $value;
    }

    /**
     * Load the framework stylesheets on every front end page.
     */
    #[AsHook('generatePage')]
    public function loadFrameworkCss(PageModel $page, LayoutModel $layout): void
    {
        if (!$this->loadBuiltinCss) {
            return;
        }

        $base = 'bundles/heimseitencontaolesbarescssframework/';

        $GLOBALS['TL_CSS'][] = $base.'contao-lesbares-css-grid-framework.css|static';
        $GLOBALS['TL_CSS'][] = $base.'contao-lesbares-css-framework-bundle.css|static';
    }
}

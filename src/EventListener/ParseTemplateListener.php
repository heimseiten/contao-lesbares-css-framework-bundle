<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Framework\Adapter;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\StringUtil;
use Contao\Template;

#[AsHook(self::HOOK, priority: 100)]
class ParseTemplateListener
{
    public const HOOK = 'parseTemplate';

    private Adapter $stringUtil;

    public function __construct(
        private readonly ContaoFramework $framework,
    ) {
        $this->stringUtil = $this->framework->getAdapter(StringUtil::class);
    }

    /**
     * Inject more CSS classes to the mod_article template.
     */
    public function __invoke(Template $objTemplate): void
    {
        if (str_starts_with($objTemplate->getName(), 'mod_article')) {
            $arrClasses = [(string) $objTemplate->class];

            $arrAnimationClasses = $this->stringUtil->deserialize((string) $objTemplate->cssAnimationClasses, true);
            $arrClasses = array_merge($arrClasses, $arrAnimationClasses);

            $arrSpaceClasses = $this->stringUtil->deserialize((string) $objTemplate->cssSpaceClasses, true);
            $arrClasses = array_merge($arrClasses, $arrSpaceClasses);
            
            $arrTextClasses = $this->stringUtil->deserialize((string) $objTemplate->cssTextClasses, true);
            $arrClasses = array_merge($arrClasses, $arrTextClasses);
            
            $arrSizeClasses = $this->stringUtil->deserialize((string) $objTemplate->cssSizeClasses, true);
            $arrClasses = array_merge($arrClasses, $arrSizeClasses);
            
            $arrColorClasses = $this->stringUtil->deserialize((string) $objTemplate->cssColorClasses, true);
            $arrClasses = array_merge($arrClasses, $arrColorClasses);
            
            $arrMiscellaneousClasses = $this->stringUtil->deserialize((string) $objTemplate->cssMiscellaneousClasses, true);
            $arrClasses = array_merge($arrClasses, $arrMiscellaneousClasses);
            
            $arrColumnClasses = $this->stringUtil->deserialize((string) $objTemplate->cssColumnClasses, true);
            $arrClasses = array_merge($arrClasses, $arrColumnClasses);
            
            $arrClasses = array_unique(array_filter($arrClasses));
            $objTemplate->class = implode(' ', $arrClasses);
        }
    }
}

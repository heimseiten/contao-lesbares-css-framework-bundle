<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\Parser;

/**
 * Reads one or more "readable" CSS files and extracts the selectable class
 * names, grouped by the category comment markers (e.g. "TEXT", "FARBEN").
 *
 * The list of files and the excluded categories are configurable, so projects
 * can add their own classes, drop the built-in framework or hide single
 * categories (see the bundle configuration).
 */
class CssClassParser
{
    /**
     * Technical/structural class names that must never be offered as a choice.
     */
    private const DENY = ['icon', 'media--above', 'rte', 'scroll-down'];

    private const DENY_PREFIX = ['ce_', 'content-', 'mod_'];

    private array|null $grouped = null;

    /**
     * @param list<string> $cssSources        absolute paths of the CSS files to parse
     * @param list<string> $excludeCategories category names to skip
     */
    public function __construct(
        private readonly array $cssSources,
        private readonly array $excludeCategories = [],
    ) {
    }

    /**
     * @return array<string, array<string, string>> category => [class => label]
     */
    public function getGroupedOptions(): array
    {
        return $this->parse();
    }

    /**
     * @return list<string> flat list of all selectable class names
     */
    public function getAllClasses(): array
    {
        $all = [];

        foreach ($this->parse() as $classes) {
            foreach (array_keys($classes) as $class) {
                $all[$class] = true;
            }
        }

        return array_keys($all);
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function parse(): array
    {
        if (null !== $this->grouped) {
            return $this->grouped;
        }

        $grouped = [];
        $seen = [];

        foreach ($this->cssSources as $file) {
            if (!\is_string($file) || !is_file($file)) {
                continue;
            }

            $css = (string) file_get_contents($file);

            // Split into sections at the "/****** TITLE ******/" comment markers
            $parts = preg_split('/\/\*+\s*([^*]+?)\s*\*+\//u', $css, -1, PREG_SPLIT_DELIM_CAPTURE);
            $category = 'Allgemein';

            for ($i = 0, $c = \count($parts); $i < $c; ++$i) {
                // Odd indexes are the captured marker titles
                if (1 === $i % 2) {
                    $category = trim($parts[$i]);
                    continue;
                }

                if (\in_array($category, $this->excludeCategories, true)) {
                    continue;
                }

                preg_match_all('/\.([\p{L}_][\p{L}\p{N}_-]*)/u', $parts[$i], $matches);

                foreach ($matches[1] as $class) {
                    if (isset($seen[$class]) || \in_array($class, self::DENY, true)) {
                        continue;
                    }

                    foreach (self::DENY_PREFIX as $prefix) {
                        if (str_starts_with($class, $prefix)) {
                            continue 2;
                        }
                    }

                    $seen[$class] = true;
                    $grouped[$category][$class] = $class;
                }
            }
        }

        foreach ($grouped as &$set) {
            uksort($set, 'strnatcasecmp');
        }

        unset($set);

        return $this->grouped = $grouped;
    }
}

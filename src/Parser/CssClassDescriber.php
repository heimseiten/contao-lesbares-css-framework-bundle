<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\Parser;

/**
 * Builds a short description for every selectable class, shown as a tooltip in
 * the back end selector: a text from the configured JSON files (class => text)
 * or, if there is none, what the class actually does according to its CSS rule
 * (e.g. "{ text-align: right; }"), so nothing has to be maintained by hand.
 */
class CssClassDescriber
{
    private const MAX_LENGTH = 140;

    private array|null $descriptions = null;

    private array|null $blocks = null;

    /**
     * @param list<string> $cssSources       the parsed sources (builtin framework + own classes)
     * @param list<string> $describeSources  further CSS files that only define what a class does
     * @param list<string> $descriptionFiles JSON files with "class": "description"
     */
    public function __construct(
        private readonly CssClassParser $parser,
        private readonly array $cssSources,
        private readonly array $describeSources = [],
        private readonly array $descriptionFiles = [],
    ) {
    }

    /**
     * @return array<string, string> class => description
     */
    public function getDescriptions(): array
    {
        if (null !== $this->descriptions) {
            return $this->descriptions;
        }

        $texts = [];

        foreach ($this->descriptionFiles as $file) {
            if (\is_string($file) && is_file($file)) {
                $json = json_decode((string) file_get_contents($file), true);
                $texts += \is_array($json) ? array_filter($json, 'is_string') : [];
            }
        }

        $descriptions = [];

        foreach ($this->parser->getAllClasses() as $class) {
            $text = $texts[$class] ?? $this->describeRule($class);

            if ('' !== $text) {
                $descriptions[$class] = $text;
            }
        }

        return $this->descriptions = $descriptions;
    }

    private function describeRule(string $class): string
    {
        $pattern = '/\.'.preg_quote($class, '/').'(?![\p{L}\p{N}_-])/u';
        $parts = [];

        foreach ($this->getBlocks() as [$selector, $declarations]) {
            foreach (explode(',', $selector) as $single) {
                if (!preg_match($pattern, $single)) {
                    continue;
                }

                $rest = trim((string) preg_replace($pattern, '', $single));

                if (mb_strlen($declarations) > self::MAX_LENGTH) {
                    $declarations = mb_substr($declarations, 0, self::MAX_LENGTH - 1).'…';
                }

                $parts[] = ('' !== $rest ? $rest.' ' : '').'{ '.$declarations.' }';
                break;
            }

            if (\count($parts) >= 2) {
                break;
            }
        }

        return $parts ? 'CSS: '.implode('  ', $parts) : '';
    }

    /**
     * Splits the CSS into blocks with their own declarations, including nested rules.
     *
     * @return list<array{0: string, 1: string}>
     */
    private function getBlocks(): array
    {
        if (null !== $this->blocks) {
            return $this->blocks;
        }

        $blocks = [];

        foreach (array_merge($this->cssSources, $this->describeSources) as $file) {
            if (!\is_string($file) || !is_file($file)) {
                continue;
            }

            $css = (string) preg_replace('/\/\*.*?\*\//s', '', (string) file_get_contents($file));
            $stack = [];
            $buffer = '';

            foreach (mb_str_split($css) as $char) {
                if ('{' === $char) {
                    $stack[] = [trim($buffer), ''];
                    $buffer = '';
                } elseif ('}' === $char) {
                    $block = array_pop($stack);

                    if (null !== $block) {
                        $block[1] .= $buffer;
                        $selector = (string) preg_replace('/\s+/', ' ', $block[0]);
                        $declarations = trim((string) preg_replace('/\s+/', ' ', $block[1]));

                        if ('' !== $declarations && !str_starts_with($selector, '@')) {
                            $blocks[] = [$selector, $declarations];
                        }
                    }

                    $buffer = '';
                } elseif (';' === $char && $stack) {
                    $stack[array_key_last($stack)][1] .= $buffer.';';
                    $buffer = '';
                } else {
                    $buffer .= $char;
                }
            }
        }

        return $this->blocks = $blocks;
    }
}

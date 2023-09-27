<?php
// src/Twig/Deserializer.php
namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\Twig;

use Contao\StringUtil;  
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Deserializer extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('deserialize', [$this, 'spaceSeperatedValue']),
        ];
    }
    public function spaceSeperatedValue(string $value): string { 
        return implode(' ', StringUtil::deserialize($value));
    }
    
}
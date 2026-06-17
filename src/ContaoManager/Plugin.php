<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Heimseiten\ContaoLesbaresCssFrameworkBundle\HeimseitenContaoLesbaresCssFrameworkBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(HeimseitenContaoLesbaresCssFrameworkBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}

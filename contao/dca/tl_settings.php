<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

PaletteManipulator::create()
    ->addLegend('lesbaresCSSFramework', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('doNotUseCssFrameworkCssFile', 'lesbaresCSSFramework', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_settings') 
;

$GLOBALS['TL_DCA']['tl_settings']['fields']['doNotUseCssFrameworkCssFile'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['doNotUseCssFrameworkCssFile'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];

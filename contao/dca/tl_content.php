<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;
use Contao\System;

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function (DataContainer $dc): void {
    foreach ($GLOBALS['TL_DCA'][$dc->table]['palettes'] as $key => $palette) {
        if (\is_string($palette)) {    
            PaletteManipulator::create()
                ->addLegend('class_selecters_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE)
                ->addField(['cssSpaceClasses', 'cssTextClasses', 'cssColorClasses', 'cssSizeClasses', 'cssColumnClasses', 'cssMiscellaneousClasses'], 'class_selecters_legend', PaletteManipulator::POSITION_APPEND)
                ->applyToPalette($key, $dc->table);
        }
    }
};

$GLOBALS['TL_DCA']['tl_content']['fields']['cssSpaceClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.space_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['background_class_ref'],
    'eval'      => ['tl_class' => 'w33', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_content']['fields']['cssTextClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.text_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['background_class_ref'],
    'eval'      => ['tl_class' => 'w33', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_content']['fields']['cssColorClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.color_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['background_class_ref'],
    'eval'      => ['tl_class' => 'w33', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_content']['fields']['cssSizeClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.size_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['background_class_ref'],
    'eval'      => ['tl_class' => 'w33', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_content']['fields']['cssColumnClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.column_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['background_class_ref'],
    'eval'      => ['tl_class' => 'w33', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_content']['fields']['cssMiscellaneousClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.miscellaneous_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['background_class_ref'],
    'eval'      => ['tl_class' => 'w33', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
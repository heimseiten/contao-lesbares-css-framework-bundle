<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

PaletteManipulator::create()
    ->addLegend('class_selecters_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField(['cssSpaceClasses', 'cssTextClasses', 'cssColorClasses', 'cssSizeClasses', 'cssColumnClasses', 'cssMiscellaneousClasses'], 'class_selecters_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_article');

$GLOBALS['TL_DCA']['tl_article']['fields']['cssSpaceClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'default'   => 'main',
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.space_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['background_class_ref'],
    'eval'      => ['tl_class' => 'w50', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cssTextClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'default'   => 'main',
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.text_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['background_class_ref'],
    'eval'      => ['tl_class' => 'w50', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cssColorClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'default'   => 'main',
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.color_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['background_class_ref'],
    'eval'      => ['tl_class' => 'w50', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cssSizeClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'default'   => 'main',
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.size_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['background_class_ref'],
    'eval'      => ['tl_class' => 'w50', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cssColumnClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'default'   => 'main',
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.column_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['background_class_ref'],
    'eval'      => ['tl_class' => 'w50', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cssMiscellaneousClasses'] = [
    'exclude'   => true,
    'filter'    => true,
    'default'   => 'main',
    'inputType' => 'select',
    'options'   => System::getContainer()->getParameter('heimseiten_contao_lesbares_css_framework.miscellaneous_classes'),
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['background_class_ref'],
    'eval'      => ['tl_class' => 'w50', 'multiple' => true, 'chosen' => true, 'includeBlankOption' => true],
    'sql'       => "varchar(255) NOT NULL default ''",
];
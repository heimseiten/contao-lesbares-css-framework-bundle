<?php

$GLOBALS['TL_DCA']['tl_article']['fields']['cssFrameworkClasses'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['cssFrameworkClasses'],
    'exclude'   => true,
    'inputType' => 'select',
    'eval'      => ['multiple' => true, 'chosen' => true, 'tl_class' => 'clr'],
    'sql'       => 'blob NULL',
];

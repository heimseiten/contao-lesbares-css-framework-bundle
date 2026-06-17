<?php

$GLOBALS['TL_DCA']['tl_content']['fields']['cssFrameworkClasses'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['cssFrameworkClasses'],
    'exclude'   => true,
    'inputType' => 'select',
    'eval'      => ['multiple' => true, 'chosen' => true, 'tl_class' => 'clr'],
    'sql'       => 'blob NULL',
];

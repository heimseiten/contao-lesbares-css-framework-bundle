<?php

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if ( !Contao\Config::get('doNotUseCssFrameworkCssFile') ) {
    $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaolesbarescssframework/contao-lesbares-css-framework-bundle.scss|static';
}

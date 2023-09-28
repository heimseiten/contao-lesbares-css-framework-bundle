<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public const ROOT_KEY = 'heimseiten_contao_lesbares_css_framework';

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(self::ROOT_KEY);
        $treeBuilder
            ->getRootNode()
            ->children()

            ->arrayNode('miscellaneous_classes')
                ->info('')
                ->prototype('scalar')->end()
                ->defaultValue([
                    'BildKreis',
                    'BildLinks',
                    'BildLinks',
                    'BildMittig',
                    'BildRahmen',
                    'BildRahmenFarbe',
                    'BildRahmenVerschoben',
                    'BildRechts',
                    'BildRund',
                    'BildVolleHöhe',
                    'ButtonAufGleicherHöhe',
                    'eckigeEcken',
                    'IconButton',
                    'InhaltLäuftÜberElementHinaus',
                    'Kachel',
                    'Rahmen1',
                    'Rahmen2',
                    'Rahmen3',
                    'Rahmen4',
                    'RahmenLinks',
                    'RahmenOben',
                    'RahmenRechts',
                    'RahmenUnten',
                    'rundeEcken',
                    'rundeEckeObenLinks',
                    'rundeEckeObenRechts',
                    'rundeEckeUntenLinks',
                    'rundeEckeUntenRechts',
                    'SchaltflächeInvertiere',
                    'verstecken',
                    'zentriert',
                ])
            ->end()

            ->arrayNode('animation_classes')
                ->info('')
                ->prototype('scalar')->end()
                ->defaultValue([
                    'einblenden',
                    'einblendenVonUnten',
                    'einblendenVonOben',
                    'einblendenVonHinten',
                    'einblendenVonVorne',
                    'einblendenVonRechts',
                    'einblendenVonLinks',
                    'einblendenVonBeidenSeiten',
                    'nacheinanderEinblenden',
                    'BilderEinblenden',
                    'BilderEinblendenVonUnten',
                    'AnimationVerzögert025',
                    'AnimationVerzögert05',
                    'AnimationVerzögert1',
                    'AnimationVerzögert15',
                    'AnimationVerzögert2',
                    'AnimationVerzögert25',
                    'Animationsdauer025',
                    'Animationsdauer05',
                    'Animationsdauer1',
                    'Animationsdauer15',
                    'Animationsdauer2',
                    'Animationsdauer25',
                ])
            ->end()

                ->arrayNode('color_classes')
                    ->info('')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        'Hintergrund1',
                        'Hintergrund2',
                        'Hintergrund3',
                        'Hintergrund4',
                        'HintergrundDunkelgrau',
                        'HintergrundGrau',
                        'HintergrundSchwarz',
                        'HintergrundText1',
                        'HintergrundText2',
                        'HintergrundText3',
                        'HintergrundText4',
                        'HintergrundTextGrau',
                        'HintergrundTextSchwarz',
                        'HintergrundTextWeiß',
                        'HintergrundWeiß',
                        'Iconfarbe1',
                        'Iconfarbe2',
                        'Iconfarbe3',
                        'Iconfarbe4',
                        'IconfarbeSchwarz',
                        'IconfarbeWeiß',
                        'Schriftfarbe1',
                        'Schriftfarbe2',
                        'Schriftfarbe3',
                        'Schriftfarbe4',
                        'SchriftfarbeDunkelgrau',
                        'SchriftfarbeGrau',
                        'SchriftfarbeSchwarz',
                        'SchriftfarbeWeiß',
                    ])
                ->end()

                ->arrayNode('size_classes')
                    ->info('')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        'Breite100',
                        'Breite1000',
                        'Breite1050',
                        'Breite1100',
                        'Breite1150',
                        'Breite1200',
                        'Breite1250',
                        'Breite1300',
                        'Breite1350',
                        'Breite1400',
                        'Breite1450',
                        'Breite150',
                        'Breite1500',
                        'Breite1550',
                        'Breite1600',
                        'Breite1650',
                        'Breite1700',
                        'Breite1750',
                        'Breite1800',
                        'Breite1850',
                        'Breite1900',
                        'Breite1950',
                        'Breite200',
                        'Breite250',
                        'Breite300',
                        'Breite350',
                        'Breite400',
                        'Breite450',
                        'Breite500',
                        'Breite550',
                        'Breite600',
                        'Breite650',
                        'Breite700',
                        'Breite750',
                        'Breite800',
                        'Breite850',
                        'Breite900',
                        'Breite950',
                        'Höhe5',
                        'Höhe10',
                        'Höhe100',
                        'Höhe15',
                        'Höhe20',
                        'Höhe25',
                        'Höhe30',
                        'Höhe35',
                        'Höhe40',
                        'Höhe45',
                        'Höhe50',
                        'Höhe55',
                        'Höhe60',
                        'Höhe65',
                        'Höhe70',
                        'Höhe75',
                        'Höhe80',
                        'Höhe85',
                        'Höhe90',
                        'Höhe95',  
                        'volleBreite',
                        'volleHöhe',
                    ])
                ->end()

                ->arrayNode('column_classes')
                    ->info('')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        'ElementeOben',
                        'ElementeUnten',
                        'ElementhöheGleich',
                        'horizontalerSpaltenabstandL',
                        'horizontalerSpaltenabstandM',
                        'horizontalerSpaltenabstandS',
                        'horizontalerSpaltenabstandXL',
                        'horizontalerSpaltenabstandXXL',
                        'horizontalMittig',
                        'Kacheln',
                        'SpaltenabstandL',
                        'SpaltenabstandM',
                        'SpaltenabstandMS',
                        'SpaltenabstandS',
                        'SpaltenabstandXL',
                        'SpaltenabstandXXL',
                        'Spaltenanzahl2',
                        'Spaltenanzahl3',
                        'Spaltenanzahl3',
                        'Spaltenanzahl4',
                        'Spaltenanzahl4',
                        'Spaltenanzahl5',
                        'Spaltenanzahl5',
                        'vertikalerSpaltenabstandL',
                        'vertikalerSpaltenabstandM',
                        'vertikalerSpaltenabstandS',
                        'vertikalerSpaltenabstandXL',
                        'vertikalerSpaltenabstandXXL',
                        'vertikalMittig',
                        'ZeilenabstandL',
                        'ZeilenabstandM',
                        'ZeilenabstandS',
                        'ZeilenabstandXL',
                        'ZeilenabstandXS',
                        'ZeilenabstandXXL',
                    ])
                ->end()

                ->arrayNode('text_classes')
                    ->info('')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        'aufDesktopBlocksatz',
                        'aufDesktopZentriert',
                        'aufMobilZentriert',
                        'fettAlsButton',
                        'fettBlock',
                        'fettGroßbuchstaben',
                        'fettGroßbuchstabenNichtFett',
                        'fettGroßbuchstabenNichtFett',
                        'fettKeineWorttrennung',
                        'fettKlein',
                        'fettKleinNichtFett',
                        'fettSchriftfarbe1',
                        'fettSchriftfarbe2',
                        'fettSchriftfarbe3',
                        'fettSchriftfarbe4',
                        'fettSchriftfarbeDunkelgrau',
                        'fettSchriftfarbeGrau',
                        'fettSchriftfarbeSchwarz',
                        'fettSchriftfarbeWeiß',
                        'Großbuchstaben',
                        'keineWorttrennung',
                        'kursiverLinkAlsButton',
                        'kursivGroßbuchstaben',
                        'LinkAlsButton',
                        'Linkfarbe1',
                        'Linkfarbe2',
                        'Linkfarbe3',
                        'Linkfarbe4',
                        'LinkfarbeSchwarz',
                        'LinkfarbeWeiß',
                        'LinkGrößeL',
                        'LinkGrößeS',
                        'LinkGrößeXL',
                        'LinkGrößeXS',
                        'LinkGrößeXXL',
                        'LinkGrößeXXS',
                        'LinkMitUnterstrich',
                        'LinkOhneUnterstrich',
                        'LinkUnterstrichBeiBerührung',
                        'ListeAbstand0',
                        'ListensymbolBuchstaben',
                        'Listensymbolfarbe1',
                        'Listensymbolfarbe2',
                        'Listensymbolfarbe3',
                        'Listensymbolfarbe4',
                        'ListensymbolfarbeSchwarz',
                        'ListensymbolfarbeWeiß',
                        'ListensymbolGroßbuchstaben',
                        'ListensymbolKleinerPunkt',
                        'ListensymbolKreis',
                        'ListensymbolLangerStrich',
                        'ListensymbolPunkt',
                        'ListensymbolQuadrat',
                        'ListensymbolRömischeZahlen',
                        'ListensymbolSpitzeAnführungszeichen',
                        'ListensymbolStrich',
                        'TextAusrichtungRechts',
                        'TextLinks',
                        'TextRahmen',
                        'TextRechts',
                        'ÜberschriftAbstandOben0',
                        'ÜberschriftAbstandUnten0',
                        'ÜberschriftGroßbuchstaben',
                        'ÜberschriftKeineWorttrennung',
                        'ÜberschriftWorttrennung',
                        'Worttrennung',
                        'zweispaltig',
                        'zentriert',
                    ])
                ->end()
                ->arrayNode('space_classes')
                    ->info('space Classes')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        'AbstandAußenL',
                        'AbstandAußenLinks0',
                        'AbstandAußenLinksL',
                        'AbstandAußenLinksM',
                        'AbstandAußenLinksMS',
                        'AbstandAußenLinksS',
                        'AbstandAußenLinksXL',
                        'AbstandAußenLinksXS',
                        'AbstandAußenLinksXXL',
                        'AbstandAußenLinksXXS',
                        'AbstandAußenLinksXXXL',
                        'AbstandAußenM',
                        'AbstandAußenMS',
                        'AbstandAußenOben0',
                        'AbstandAußenObenL',
                        'AbstandAußenObenM',
                        'AbstandAußenObenMS',
                        'AbstandAußenObenS',
                        'AbstandAußenObenXL',
                        'AbstandAußenObenXS',
                        'AbstandAußenObenXXL',
                        'AbstandAußenObenXXS',
                        'AbstandAußenObenXXXL',
                        'AbstandAußenRechts0',
                        'AbstandAußenRechtsL',
                        'AbstandAußenRechtsM',
                        'AbstandAußenRechtsMS',
                        'AbstandAußenRechtsS',
                        'AbstandAußenRechtsXL',
                        'AbstandAußenRechtsXS',
                        'AbstandAußenRechtsXXL',
                        'AbstandAußenRechtsXXS',
                        'AbstandAußenRechtsXXXL',
                        'AbstandAußenS',
                        'AbstandAußenUnten0',
                        'AbstandAußenUntenL',
                        'AbstandAußenUntenM',
                        'AbstandAußenUntenMS',
                        'AbstandAußenUntenS',
                        'AbstandAußenUntenXL',
                        'AbstandAußenUntenXS',
                        'AbstandAußenUntenXXL',
                        'AbstandAußenUntenXXS',
                        'AbstandAußenUntenXXXL',
                        'AbstandAußenXL',
                        'AbstandAußenXS',
                        'AbstandAußenXXL',
                        'AbstandAußenXXXL',
                        'AbstandAußenXXXXL',
                        'AbstandL',
                        'AbstandLinks0',
                        'AbstandLinksL',
                        'AbstandLinksM',
                        'AbstandLinksMS',
                        'AbstandLinksS',
                        'AbstandLinksXL',
                        'AbstandLinksXS',
                        'AbstandLinksXXL',
                        'AbstandLinksXXS',
                        'AbstandLinksXXXL',
                        'AbstandM',
                        'AbstandMobilL',
                        'AbstandMobilLinks0',
                        'AbstandMobilLinksL',
                        'AbstandMobilLinksM',
                        'AbstandMobilLinksMS',
                        'AbstandMobilLinksS',
                        'AbstandMobilLinksXL',
                        'AbstandMobilLinksXS',
                        'AbstandMobilLinksXXL',
                        'AbstandMobilLinksXXS',
                        'AbstandMobilLinksXXXL',
                        'AbstandMobilM',
                        'AbstandMobilMS',
                        'AbstandMobilOben0',
                        'AbstandMobilObenL',
                        'AbstandMobilObenM',
                        'AbstandMobilObenMS',
                        'AbstandMobilObenS',
                        'AbstandMobilObenXL',
                        'AbstandMobilObenXS',
                        'AbstandMobilObenXXL',
                        'AbstandMobilObenXXS',
                        'AbstandMobilObenXXXL',
                        'AbstandMobilRechts0',
                        'AbstandMobilRechtsL',
                        'AbstandMobilRechtsM',
                        'AbstandMobilRechtsMS',
                        'AbstandMobilRechtsS',
                        'AbstandMobilRechtsXL',
                        'AbstandMobilRechtsXS',
                        'AbstandMobilRechtsXXL',
                        'AbstandMobilRechtsXXS',
                        'AbstandMobilRechtsXXXL',
                        'AbstandMobilS',
                        'AbstandMobilUnten0',
                        'AbstandMobilUntenL',
                        'AbstandMobilUntenM',
                        'AbstandMobilUntenMS',
                        'AbstandMobilUntenS',
                        'AbstandMobilUntenXL',
                        'AbstandMobilUntenXS',
                        'AbstandMobilUntenXXL',
                        'AbstandMobilUntenXXS',
                        'AbstandMobilUntenXXXL',
                        'AbstandMobilXL',
                        'AbstandMobilXS',
                        'AbstandMobilXXL',
                        'AbstandMobilXXXL',
                        'AbstandMobilXXXXL',
                        'AbstandMS',
                        'AbstandNegativLinks0',
                        'AbstandNegativLinksL',
                        'AbstandNegativLinksM',
                        'AbstandNegativLinksMS',
                        'AbstandNegativLinksS',
                        'AbstandNegativLinksXL',
                        'AbstandNegativLinksXS',
                        'AbstandNegativLinksXXL',
                        'AbstandNegativLinksXXS',
                        'AbstandNegativLinksXXXL',
                        'AbstandNegativOben0',
                        'AbstandNegativObenL',
                        'AbstandNegativObenM',
                        'AbstandNegativObenMS',
                        'AbstandNegativObenS',
                        'AbstandNegativObenXL',
                        'AbstandNegativObenXS',
                        'AbstandNegativObenXXL',
                        'AbstandNegativObenXXS',
                        'AbstandNegativObenXXXL',
                        'AbstandNegativRechts0',
                        'AbstandNegativRechtsL',
                        'AbstandNegativRechtsM',
                        'AbstandNegativRechtsMS',
                        'AbstandNegativRechtsS',
                        'AbstandNegativRechtsXL',
                        'AbstandNegativRechtsXS',
                        'AbstandNegativRechtsXXL',
                        'AbstandNegativRechtsXXS',
                        'AbstandNegativRechtsXXXL',
                        'AbstandNegativUnten0',
                        'AbstandNegativUntenL',
                        'AbstandNegativUntenM',
                        'AbstandNegativUntenMS',
                        'AbstandNegativUntenS',
                        'AbstandNegativUntenXL',
                        'AbstandNegativUntenXS',
                        'AbstandNegativUntenXXL',
                        'AbstandNegativUntenXXS',
                        'AbstandNegativUntenXXXL',
                        'AbstandOben0',
                        'AbstandObenL',
                        'AbstandObenM',
                        'AbstandObenMS',
                        'AbstandObenS',
                        'AbstandObenXL',
                        'AbstandObenXS',
                        'AbstandObenXXL',
                        'AbstandObenXXS',
                        'AbstandObenXXXL',
                        'AbstandRechts0',
                        'AbstandRechtsL',
                        'AbstandRechtsM',
                        'AbstandRechtsMS',
                        'AbstandRechtsS',
                        'AbstandRechtsXL',
                        'AbstandRechtsXS',
                        'AbstandRechtsXXL',
                        'AbstandRechtsXXS',
                        'AbstandRechtsXXXL',
                        'AbstandS',
                        'AbstandUnten0',
                        'AbstandUntenL',
                        'AbstandUntenM',
                        'AbstandUntenMS',
                        'AbstandUntenS',
                        'AbstandUntenXL',
                        'AbstandUntenXS',
                        'AbstandUntenXXL',
                        'AbstandUntenXXS',
                        'AbstandUntenXXXL',
                        'AbstandXL',
                        'AbstandXS',
                        'AbstandXXL',
                        'AbstandXXS',
                        'AbstandXXXL',
                        'AbstandXXXXL',
                        'keinAbstand',
                        'keinAbstandAußen',
                        'keinAbstandMobil',
                    ])
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

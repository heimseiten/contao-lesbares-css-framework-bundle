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
                    'SchaltflächeInvertieren',
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
                    'animierterUnterstrich',
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
                        'fettSchriftfarbe1',
                        'fettSchriftfarbe2',
                        'fettSchriftfarbe3',
                        'fettSchriftfarbe4',
                        'fettSchriftfarbeDunkelgrau',
                        'fettSchriftfarbeGrau',
                        'fettSchriftfarbeSchwarz',
                        'fettSchriftfarbeWeiß',
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
                        'Linkfarbe1',
                        'Linkfarbe2',
                        'Linkfarbe3',
                        'Linkfarbe4',
                        'LinkfarbeSchwarz',
                        'LinkfarbeWeiß',
                        'Listensymbolfarbe1',
                        'Listensymbolfarbe2',
                        'Listensymbolfarbe3',
                        'Listensymbolfarbe4',
                        'ListensymbolfarbeSchwarz',
                        'ListensymbolfarbeWeiß',
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
                        'minimaleHöhe5Prozent',
                        'minimaleHöhe10Prozent',
                        'minimaleHöhe15Prozent',
                        'minimaleHöhe20Prozent',
                        'minimaleHöhe25Prozent',
                        'minimaleHöhe30Prozent',
                        'minimaleHöhe35Prozent',
                        'minimaleHöhe40Prozent',
                        'minimaleHöhe45Prozent',
                        'minimaleHöhe50Prozent',
                        'minimaleHöhe55Prozent',
                        'minimaleHöhe60Prozent',
                        'minimaleHöhe65Prozent',
                        'minimaleHöhe70Prozent',
                        'minimaleHöhe75Prozent',
                        'minimaleHöhe80Prozent',
                        'minimaleHöhe85Prozent',
                        'minimaleHöhe90Prozent',
                        'minimaleHöhe95Prozent',
                        'minimaleHöhe100Prozent',
                        'minimaleHöhe50Pixel',
                        'minimaleHöhe100Pixel',
                        'minimaleHöhe150Pixel',
                        'minimaleHöhe200Pixel',
                        'minimaleHöhe250Pixel',
                        'minimaleHöhe300Pixel',
                        'minimaleHöhe350Pixel',
                        'minimaleHöhe400Pixel',
                        'minimaleHöhe450Pixel',
                        'minimaleHöhe500Pixel',
                        'minimaleHöhe550Pixel',
                        'minimaleHöhe600Pixel',
                        'minimaleHöhe650Pixel',
                        'minimaleHöhe700Pixel',
                        'minimaleHöhe750Pixel',
                        'minimaleHöhe800Pixel',
                        'minimaleHöhe850Pixel',
                        'minimaleHöhe900Pixel',
                        'minimaleHöhe950Pixel',
                        'minimaleHöhe1000Pixel',
                        'maximaleHöhe5Prozent',
                        'maximaleHöhe10Prozent',
                        'maximaleHöhe15Prozent',
                        'maximaleHöhe20Prozent',
                        'maximaleHöhe25Prozent',
                        'maximaleHöhe30Prozent',
                        'maximaleHöhe35Prozent',
                        'maximaleHöhe40Prozent',
                        'maximaleHöhe45Prozent',
                        'maximaleHöhe50Prozent',
                        'maximaleHöhe55Prozent',
                        'maximaleHöhe60Prozent',
                        'maximaleHöhe65Prozent',
                        'maximaleHöhe70Prozent',
                        'maximaleHöhe75Prozent',
                        'maximaleHöhe80Prozent',
                        'maximaleHöhe85Prozent',
                        'maximaleHöhe90Prozent',
                        'maximaleHöhe95Prozent',
                        'maximaleHöhe100Prozent',
                        'maximaleHöhe50Pixel',
                        'maximaleHöhe100Pixel',
                        'maximaleHöhe150Pixel',
                        'maximaleHöhe200Pixel',
                        'maximaleHöhe250Pixel',
                        'maximaleHöhe300Pixel',
                        'maximaleHöhe350Pixel',
                        'maximaleHöhe400Pixel',
                        'maximaleHöhe450Pixel',
                        'maximaleHöhe500Pixel',
                        'maximaleHöhe550Pixel',
                        'maximaleHöhe600Pixel',
                        'maximaleHöhe650Pixel',
                        'maximaleHöhe700Pixel',
                        'maximaleHöhe750Pixel',
                        'maximaleHöhe800Pixel',
                        'maximaleHöhe850Pixel',
                        'maximaleHöhe900Pixel',
                        'maximaleHöhe950Pixel',
                        'maximaleHöhe1000Pixel',
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
                        'fettKeineWorttrennung',
                        'fettKlein',
                        'fettSehrKlein',
                        'fettKleinNichtFett',
                        'fettSehrKleinNichtFett',
                        'Großbuchstaben',
                        'keineWorttrennung',
                        'kursiverLinkAlsButton',
                        'kursivGroßbuchstaben',
                        'kursivGroß',
                        'kursivKlein',
                        'kursivGroßNichtKursiv',
                        'kursivSehrGroß',
                        'kursivSehrGroßNichtKursiv',
                        'kursivSehrKlein',
                        'kursivKleinNichtKursiv',
                        'kursivSehrKleinNichtKursiv',
                        'LinkAlsButton',
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
                        'ListensymbolGroßbuchstaben',
                        'ListensymbolKleinerPunkt',
                        'ListensymbolKreis',
                        'ListensymbolLangerStrich',
                        'ListensymbolPunkt',
                        'ListensymbolQuadrat',
                        'ListensymbolRömischeZahlen',
                        'ListensymbolSpitzeAnführungszeichen',
                        'ListensymbolStrich',
                        'SchriftGroß',
                        'SchriftSehrGroß',
                        'SchriftKlein',
                        'SchriftSehrKlein',
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
                        'ZeilenabstandL',
                        'ZeilenabstandM',
                        'ZeilenabstandS',
                        'ZeilenabstandXL',
                        'ZeilenabstandXS',
                        'ZeilenabstandXXL',
                    ])
                ->end()
                ->arrayNode('space_classes')
                    ->info('space Classes')
                    ->prototype('scalar')->end()
                    ->defaultValue([
                        'AbstandAußen0',
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
                        'AbstandBild0',
                        'AbstandBildXXXS',
                        'AbstandBildXXS',
                        'AbstandBildXS',
                        'AbstandBildS',
                        'AbstandBildM',
                        'AbstandBildL',
                        'AbstandBildXL',
                        'AbstandBildXXL',
                        'AbstandBildXXXL',
                        'AbstandBildXXXXL',
                        'AbstandBildOben0',
                        'AbstandBildObenXXXS',
                        'AbstandBildObenXXS',
                        'AbstandBildObenXS',
                        'AbstandBildObenS',
                        'AbstandBildObenM',
                        'AbstandBildObenL',
                        'AbstandBildObenXL',
                        'AbstandBildObenXXL',
                        'AbstandBildObenXXXL',
                        'AbstandBildRechts0',
                        'AbstandBildRechtsXXXS',
                        'AbstandBildRechtsXXS',
                        'AbstandBildRechtsXS',
                        'AbstandBildRechtsS',
                        'AbstandBildRechtsM',
                        'AbstandBildRechtsL',
                        'AbstandBildRechtsXL',
                        'AbstandBildRechtsXXL',
                        'AbstandBildRechtsXXXL',
                        'AbstandBildUnten0',
                        'AbstandBildUntenXXXS',
                        'AbstandBildUntenXXS',
                        'AbstandBildUntenXS',
                        'AbstandBildUntenS',
                        'AbstandBildUntenM',
                        'AbstandBildUntenL',
                        'AbstandBildUntenXL',
                        'AbstandBildUntenXXL',
                        'AbstandBildUntenXXXL',
                        'AbstandBildLinks0',
                        'AbstandBildLinksXXXS',
                        'AbstandBildLinksXXS',
                        'AbstandBildLinksXS',
                        'AbstandBildLinksS',
                        'AbstandBildLinksM',
                        'AbstandBildLinksL',
                        'AbstandBildLinksXL',
                        'AbstandBildLinksXXL',
                        'AbstandBildLinksXXXL',
                        'Abstand0',
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
                        'AbstandMobil0',
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
                        'AbstandText0',
                        'AbstandTextXXXS',
                        'AbstandTextXXS',
                        'AbstandTextXS',
                        'AbstandTextS',
                        'AbstandTextM',
                        'AbstandTextL',
                        'AbstandTextXL',
                        'AbstandTextXXL',
                        'AbstandTextXXXL',
                        'AbstandTextXXXXL',
                        'AbstandTextOben0',
                        'AbstandTextObenXXXS',
                        'AbstandTextObenXXS',
                        'AbstandTextObenXS',
                        'AbstandTextObenS',
                        'AbstandTextObenM',
                        'AbstandTextObenL',
                        'AbstandTextObenXL',
                        'AbstandTextObenXXL',
                        'AbstandTextObenXXXL',
                        'AbstandTextRechts0',
                        'AbstandTextRechtsXXXS',
                        'AbstandTextRechtsXXS',
                        'AbstandTextRechtsXS',
                        'AbstandTextRechtsS',
                        'AbstandTextRechtsM',
                        'AbstandTextRechtsL',
                        'AbstandTextRechtsXL',
                        'AbstandTextRechtsXXL',
                        'AbstandTextRechtsXXXL',
                        'AbstandTextUnten0',
                        'AbstandTextUntenXXXS',
                        'AbstandTextUntenXXS',
                        'AbstandTextUntenXS',
                        'AbstandTextUntenS',
                        'AbstandTextUntenM',
                        'AbstandTextUntenL',
                        'AbstandTextUntenXL',
                        'AbstandTextUntenXXL',
                        'AbstandTextUntenXXXL',
                        'AbstandTextLinks0',
                        'AbstandTextLinksXXXS',
                        'AbstandTextLinksXXS',
                        'AbstandTextLinksXS',
                        'AbstandTextLinksS',
                        'AbstandTextLinksM',
                        'AbstandTextLinksL',
                        'AbstandTextLinksXL',
                        'AbstandTextLinksXXL',
                        'AbstandTextLinksXXXL',
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
                    ])
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

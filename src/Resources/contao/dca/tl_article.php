<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

PaletteManipulator::create()
    ->addLegend('articleBgLegend', 'title_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('articleImage', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('articleVideo', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('articleImageSize', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('verticalBgShift', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('viewBgImageOnMobile', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('viewBgVideoOnMobile','articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('bgParallax', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('noBgVideoLoop', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addField('BgCssFilter', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    
    ->addLegend('articleWidthHeight', 'articleBgLegend', PaletteManipulator::POSITION_AFTER)
    ->addField('articleMaxWidth', 'articleWidthHeight', PaletteManipulator::POSITION_APPEND)
    ->addField('articleMinHeight', 'articleWidthHeight', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_article');

$GLOBALS['TL_DCA']['tl_article']['fields']['articleImage'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['articleImage'],
    'inputType' => 'fileTree',
    'eval' => array('tl_class'  => 'w50', 'fieldType' => 'radio', 'filesOnly' => true, 'extensions' => \Config::get('validImageTypes') ),
    'sql'       => "blob NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['articleVideo'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['articleVideo'],
    'inputType' => 'fileTree',
    'eval' => array('tl_class'  => 'w50', 'fieldType' => 'radio', 'filesOnly' => true, 'extensions' => 'mp4' ),
    'sql'       => "blob NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['articleImageSize'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_article']['articleImageSize'],
    'exclude' => true,
    'inputType' => 'imageSize',
    'reference' => &$GLOBALS['TL_LANG']['MSC'],
    'eval' => [
        'rgxp' => 'natural',
        'includeBlankOption' => true,
        'nospace' => true,
        'helpwizard' => true,
        'tl_class' => 'clr w50',
    ],
    'options_callback' => function () {
        return System::getContainer()->get('contao.image.image_sizes')->getOptionsForUser(BackendUser::getInstance());
    },
    'sql' => "varchar(64) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['verticalBgShift'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['verticalBgShift'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['viewBgVideoOnMobile'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['viewBgVideoOnMobile'], 
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['viewBgImageOnMobile'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['viewBgImageOnMobile'], 
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['noBgVideoLoop'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['noBgVideoLoop'], 
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['bgParallax'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['bgParallax'], 
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['BgCssFilter'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['BgCssFilter'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'clr'),
    'sql'       => "text NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['articleMaxWidth'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['articleMaxWidth'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['articleMinHeight'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['articleMinHeight'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];


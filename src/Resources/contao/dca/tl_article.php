<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;
use Contao\BackendUser;

PaletteManipulator::create()
    ->addLegend('articleBgLegend', 'layout_legend', PaletteManipulator::POSITION_BEFORE)
        ->addField('articleImage', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
        ->addField('BgCssFilter', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
        ->addField('viewBgImageOnMobile', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
        ->addField('articleImageSize', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
        ->addField('bgParallax', 'articleBgLegend', PaletteManipulator::POSITION_APPEND)
    ->addLegend('articleBgLegendVideo', 'layout_legend', PaletteManipulator::POSITION_BEFORE)
        ->addField('articleVideo', 'articleBgLegendVideo', PaletteManipulator::POSITION_APPEND)
        ->addField('noBgVideoLoop', 'articleBgLegendVideo', PaletteManipulator::POSITION_APPEND)
        ->addField('viewBgVideoOnMobile','articleBgLegendVideo', PaletteManipulator::POSITION_APPEND)
    ->addLegend('articleBgLegendColor', 'layout_legend', PaletteManipulator::POSITION_BEFORE)
        ->addField('bgColor', 'articleBgLegendColor', PaletteManipulator::POSITION_APPEND)
        ->addField('fontColor', 'articleBgLegendColor', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_article');

$GLOBALS['TL_DCA']['tl_article']['fields']['articleImage'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['articleImage'],
    'inputType' => 'fileTree',
    'eval'      => array(
        'tl_class'  => 'w50', 
        'fieldType' => 'radio', 
        'filesOnly' => true, 
		'extensions' => implode( ',', System::getContainer()->getParameter('contao.image.valid_extensions') ),
    ),
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
        return System::getContainer()->get('contao.image.sizes')->getOptionsForUser(BackendUser::getInstance());
    },
    'sql' => "varchar(64) NOT NULL default ''"
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
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['BgCssFilter'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['BgCssFilter'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_article']['fields']['bgColor'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['bgColor'],
    'inputType' => 'text',
    'eval'      => array('maxlength'=>7, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 clr wizard'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_article']['fields']['fontColor'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['fontColor'],
    'inputType' => 'text',
    'eval'      => array('maxlength'=>7, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
    'sql'       => "text NULL"
];

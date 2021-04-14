<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_article']['fields']['articleImage'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['articleImage'],
    'inputType' => 'fileTree',
    'eval' => array('tl_class'  => 'w50', 'fieldType' => 'radio', 'filesOnly' => true, 'extensions' => \Config::get('validImageTypes') ),
    'sql'       => "blob NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cc_bg_video'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['cc_bg_video'],
    'inputType' => 'fileTree',
    'eval' => array('tl_class'  => 'w50', 'fieldType' => 'radio', 'filesOnly' => true, 'extensions' => 'mp4' ),
    'sql'       => "blob NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cc_bg_shift_vertical'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['cc_bg_shift_vertical'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'clr'),
    'sql'       => "text NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cc_bg_view_video_on_mobile'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['cc_bg_view_video_on_mobile'], 
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cc_bg_video_loop'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['cc_bg_video_loop'], 
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cc_bg_view_img_on_mobile'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['cc_bg_view_img_on_mobile'], 
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cc_bg_parallax'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['cc_bg_parallax'], 
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];
$GLOBALS['TL_DCA']['tl_article']['fields']['cc_bg_css_filter'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['cc_bg_css_filter'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'clr'),
    'sql'       => "text NULL"
];



PaletteManipulator::create()
    ->addLegend('cc_legend_bg', 'title_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('articleImage',               'cc_legend_bg', PaletteManipulator::POSITION_APPEND)
    ->addField('cc_bg_video',               'cc_legend_bg', PaletteManipulator::POSITION_APPEND)
    ->addField('cc_bg_shift_vertical',      'cc_legend_bg', PaletteManipulator::POSITION_APPEND)
    ->addField('cc_bg_view_img_on_mobile',  'cc_legend_bg', PaletteManipulator::POSITION_APPEND)
    ->addField('cc_bg_view_video_on_mobile','cc_legend_bg', PaletteManipulator::POSITION_APPEND)
    ->addField('cc_bg_parallax',            'cc_legend_bg', PaletteManipulator::POSITION_APPEND)
    ->addField('cc_bg_video_loop',          'cc_legend_bg', PaletteManipulator::POSITION_APPEND)
    ->addField('cc_bg_css_filter',              'cc_legend_bg', PaletteManipulator::POSITION_APPEND)    

    ->applyToPalette('default', 'tl_article') 
;
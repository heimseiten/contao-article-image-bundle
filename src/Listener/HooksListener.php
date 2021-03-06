<?php

declare(strict_types=1);

namespace Heimseiten\ContaoArticleImageBundle\Listener;

use Contao\FrontendTemplate;
use Contao\Template;
use Contao\Module;

class HooksListener
{
    public function onCompileArticle(FrontendTemplate $objTemplate, array $arrData, Module $module): void
    {
        if (TL_MODE == 'FE' && $objTemplate->type == 'article') {
            $mod_article_before_content_elements = new FrontendTemplate('caib_mod_article_before_content_elements');
            $mod_article_before_content_elements->articleImage = $arrData['articleImage'];
            $mod_article_before_content_elements->articleImageSize = $arrData['articleImageSize'];
            $mod_article_before_content_elements->articleVideo = $arrData['articleVideo'];
            $mod_article_before_content_elements->noBgVideoLoop = $arrData['noBgVideoLoop'];
            $mod_article_before_content_elements->viewBgVideoOnMobile = $arrData['viewBgVideoOnMobile'];
            $mod_article_before_content_elements->viewBgImageOnMobile = $arrData['viewBgImageOnMobile'];
            $mod_article_before_content_elements->verticalBgShift = $arrData['verticalBgShift'];
            $mod_article_before_content_elements->bgParallax = $arrData['bgParallax'];
            $mod_article_before_content_elements->BgCssFilter = $arrData['BgCssFilter'];
            $elements = $objTemplate->elements;
            array_unshift($elements, $mod_article_before_content_elements->parse());
            
            $objTemplate->elements = $elements;
        }
    }

    public function onParseTemplate(Template $objTemplate)
    {
        if (TL_MODE == 'FE' && $objTemplate->type == 'article') {
            if ( deserialize($objTemplate->bgColor)[0] ) { 
                $objTemplate->style .= ' --article_bg_color: '. getRgbaFromHexAndOpacity(deserialize($objTemplate->bgColor)[0], deserialize($objTemplate->bgColor)[1]) .';';
                $objTemplate->class .= ' article_bg_color';
            }
            if ( deserialize($objTemplate->fontColor)[0] ) { 
                $objTemplate->style .= ' --font_color: '. getRgbaFromHexAndOpacity(deserialize($objTemplate->fontColor)[0], deserialize($objTemplate->fontColor)[1]) .';';
                $objTemplate->class .= ' font_color';
            }
            if ( $objTemplate->articleImage ) { 
                $objTemplate->class .= ' has_img';
            }
        }
    }
}

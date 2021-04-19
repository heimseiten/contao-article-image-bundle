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
            $template = new FrontendTemplate('article_image');

            $template->articleImage = $arrData['articleImage'];
            $template->articleImageSize = $arrData['articleImageSize'];
            $template->articleVideo = $arrData['articleVideo'];
            $template->noBgVideoLoop = $arrData['noBgVideoLoop'];
            $template->viewBgVideoOnMobile = $arrData['viewBgVideoOnMobile'];
            $template->viewBgImageOnMobile = $arrData['viewBgImageOnMobile'];
            $template->verticalBgShift = $arrData['verticalBgShift'];
            $template->bgParallax = $arrData['bgParallax'];
            $template->BgCssFilter = $arrData['BgCssFilter'];
            $template->articleMinHeight = $arrData['articleMinHeight'];
            $template->articleMaxWidth = $arrData['articleMaxWidth'];
            
            $elements = $objTemplate->elements;
            array_unshift($elements, $template->parse());
            $objTemplate->elements = $elements;

            $objTemplate->style .= '--test: 34px;';
        }
    }

    public function onParseTemplate(Template $objTemplate)
    {
        if (TL_MODE == 'FE' && $objTemplate->type == 'article') {
            if ($objTemplate->articleMaxWidth) { $objTemplate->style .= 'max-width: ' . $objTemplate->articleMaxWidth . ';'; }
            if ($objTemplate->articleMinHeight) { $objTemplate->style .= 'min-height: ' . $objTemplate->articleMinHeight . ';'; }
        }
    }

}

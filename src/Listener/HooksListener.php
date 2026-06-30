<?php

declare(strict_types=1);

namespace Heimseiten\ContaoArticleImageBundle\Listener;

use Contao\FrontendTemplate;
use Contao\Template;
use Contao\Module;
use Contao\StringUtil;

class HooksListener
{
    public function onCompileArticle(FrontendTemplate $objTemplate, array $arrData, Module $module): void
    {
        if ($objTemplate->type !== 'article') {
            return;
        }

        // Null-coalesce every field: not every article row carries all article-image
        // columns, which otherwise triggers "Undefined array key" warnings on each article.
        $tpl = new FrontendTemplate('caib_mod_article_before_content_elements');
        $tpl->articleImage = $arrData['articleImage'] ?? null;
        $tpl->articleImageSize = $arrData['articleImageSize'] ?? null;
        $tpl->articleVideo = $arrData['articleVideo'] ?? null;
        $tpl->noBgVideoLoop = $arrData['noBgVideoLoop'] ?? null;
        $tpl->viewBgVideoOnMobile = $arrData['viewBgVideoOnMobile'] ?? null;
        $tpl->viewBgImageOnMobile = $arrData['viewBgImageOnMobile'] ?? null;
        $tpl->verticalBgShift = $arrData['verticalBgShift'] ?? null;
        $tpl->bgParallax = $arrData['bgParallax'] ?? null;
        $tpl->BgCssFilter = $arrData['BgCssFilter'] ?? null;

        $elements = $objTemplate->elements;
        array_unshift($elements, $tpl->parse());

        $objTemplate->elements = $elements;
    }

    public function onParseTemplate(Template $objTemplate)
    {
        if ($objTemplate->type !== 'article') {
            return;
        }

        // deserialize(..., true) yields an array, so articles without a colour no longer
        // trigger "array offset on null" warnings on every render.
        $bgColor = StringUtil::deserialize($objTemplate->bgColor, true);
        if (!empty($bgColor[0])) {
            $objTemplate->style .= ' --article_bg_color: ' . getRgbaFromHexAndOpacity($bgColor[0], $bgColor[1] ?? '') . ';';
            $objTemplate->class .= ' article_bg_color';
        }

        $fontColor = StringUtil::deserialize($objTemplate->fontColor, true);
        if (!empty($fontColor[0])) {
            $objTemplate->style .= ' --font_color: ' . getRgbaFromHexAndOpacity($fontColor[0], $fontColor[1] ?? '') . ';';
            $objTemplate->class .= ' font_color';
        }

        if ($objTemplate->articleImage) {
            $objTemplate->class .= ' has_img';
        }
    }
}

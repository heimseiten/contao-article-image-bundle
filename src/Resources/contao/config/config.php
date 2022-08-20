<?php

  $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaoarticleimage/contao_article_image_bundle.scss|static';

  function getRgbaFromHexAndOpacity($hex, $opacity) {
  if ($opacity) {
    $alpha = $opacity/100;
    } else { $alpha = '1'; }
    list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");
    return 'rgba('.$r.','.$g.','.$b.','.$alpha.')';
  }
}
<?php
/**
 * @link https://github.com/kriptograf/yii2-infinite-scroll
 * @copyright Copyright (c) 2018 Moskvin Vitaliy
 * @license MIT
 */

namespace kriptograf\infinitescroll;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Moskvin Vitaliy <foreach@mail.ru>
 */
class InfiniteScrollAsset extends AssetBundle
{
    public $sourcePath = '@bower/infinite-scroll';
    public $css = [
    ];
    public $js = [  // Configured conditionally (source/minified) during init()
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        parent::init();
        $this->js[] = YII_DEBUG ? 'infinite-scroll.pkgd.js' : 'infinite-scroll.pkgd.min.js';

        $this->publishOptions['beforeCopy'] = function ($from) {
            $path = str_replace(realpath(Yii::getAlias('@bower') . '\infinite-scroll'), '', $from);
            return
                $path !== DIRECTORY_SEPARATOR.'site'
                && $path !== DIRECTORY_SEPARATOR.'wordpress-plugin';
        };
    }
}

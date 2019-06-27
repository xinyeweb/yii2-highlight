<?php

namespace xinyeweb\highlight;

use yii\web\AssetBundle;
use yii\web\View;
use yii\helpers\Json;

/**
 * This is just an example.
 */
class HighlightAsset extends AssetBundle
{
    const DEFAULT_SELECTOR = 'pre code';

    public $css = [
        'styles/default.css',
    ];
    public $js = [
        'highlight.pack.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init() {
        $this->sourcePath = dirname(__FILE__) .DIRECTORY_SEPARATOR . 'assets';
        parent::init();
    }

    public $selector = self::DEFAULT_SELECTOR;

    public $options = [];

    public static function register($view)
    {
        $configOptions  = [];
        $configSelector = self::DEFAULT_SELECTOR;
        try {
            $thisBundle = \Yii::$app->getAssetManager()->getBundle(__CLASS__);
            $configOptions  = $thisBundle->options;
            $configSelector = $thisBundle->selector;
        } catch(\Exception $e) {
            // do nothing...
        }
        $options = empty($configOptions) ? '' : Json::encode($configOptions);
        if ($configSelector !== self::DEFAULT_SELECTOR) {
            $view->registerJs('
                hljs.configure(' . $options . ');
                jQuery(\'' . $configSelector . '\').each(function(i, block) {
                    hljs.highlightBlock(block);
                });');
        } else {
            $view->registerJs('
                hljs.configure(' . $options . ');
                hljs.initHighlightingOnLoad();',
                View::POS_END
            );
        }
        return parent::register($view);
    }
}

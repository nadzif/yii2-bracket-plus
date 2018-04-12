<?php

namespace akupeduli\bracket\assets\core;

use akupeduli\bracket\Bracket;
use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $publishOptions = [
        "except" => [
            "*.html", "*.scss", "*.cfg", "*.config",
            "*.less",
        ],
    ];

    public $css = [
        "lib/font-awesome/css/font-awesome.css",
        "lib/Ionicons/css/ionicons.css",
        "lib/perfect-scrollbar/css/perfect-scrollbar.css",
        "lib/jquery-switchbutton/jquery.switchButton.css",
    ];

    public $js = [
        "lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js",
        "lib/moment/moment.js",
        "lib/jquery-ui/jquery-ui.js",
        "lib/jquery-switchbutton/jquery.switchButton.js",
        "lib/peity/jquery.peity.js",
        "js/bracket.js",
    ];

    public $depends = [
        "yii\\web\\YiiAsset",
        "yii\\bootstrap\\BootstrapAsset",
        "yii\\bootstrap\\BootstrapPluginAsset",
    ];

    public function init()
    {
        $bracket          = Bracket::getComponent();
        $this->sourcePath = $bracket->sourcePath;
        // $this->css[]      = "css/colors/{$$bracket->theme}.css";
        parent::init();
    }
}

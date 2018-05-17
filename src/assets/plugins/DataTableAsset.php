<?php

namespace nadzif\bracket\assets\plugins;

use nadzif\bracket\assets\core\PluginAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\JqueryAsset;

class DataTableAsset extends PluginAsset
{
    public $pluginName = "datatables";
    public $css = [
        "jquery.dataTables.css",
    ];
    public $js = [
        "jquery.dataTables.js",
    ];
    public $depends = [
        JqueryAsset::class,
        BootstrapPluginAsset::class
    ];
}

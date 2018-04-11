<?php

namespace akupeduli\bracket\assets\plugins;

use akupeduli\bracket\assets\core\PluginAsset;

class DataTableAsset extends PluginAsset
{
    public $pluginName = "datatables";
    public $js         = [
        "jquery.dataTables.min.js",
    ];
    public $depends = [
        "yii\\web\\JqueryAsset",
        "yii\\bootstrap\\BootstrapAsset",
        "yii\\bootstrap\\BootstrapPluginAsset",
    ];
}

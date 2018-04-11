<?php

namespace akupeduli\bracket\assets\plugins;

use akupeduli\bracket\assets\core\PluginAsset;

class StickyKitAsset extends PluginAsset
{
    public $pluginName = "sticky-kit-master";
    public $js         = [
        "dist/sticky-kit" . (YII_ENV === YII_ENV_DEV ? "" : ".min") . ".js",
    ];
}

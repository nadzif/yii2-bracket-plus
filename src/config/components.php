<?php

use akupeduli\bracket\assets\plugins\DataTableAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\bootstrap4\PopperAsset;
use yii\web\JqueryAsset;
use yii\web\View;

return [
    JqueryAsset::class => [
        "jsOptions" => [
            "position" => View::POS_HEAD,
        ],
    ],

    BootstrapPluginAsset::class => [
        'depends' => [
            JqueryAsset::class,
            PopperAsset::class
        ],
    ],

    DataTableAsset::class => [
        'class' => DataTableAsset::class,
    ],
];

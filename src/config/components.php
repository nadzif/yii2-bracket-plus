<?php

use akupeduli\bracket\assets\plugins\DataTableAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\bootstrap\PopperAsset;
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

    'mimicreative\datatables\assets\DataTableAsset' => [
        'class' => DataTableAsset::class,
    ],
];

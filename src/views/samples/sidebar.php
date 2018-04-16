<?php
use akupeduli\bracket\widgets\Menu;
?>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
<?=Menu::widget(
    [
        "items" => [
            ["label" => "Home", "url" => [Yii::$app->getHomeUrl()], "icon" => "ion-ios-home-outline"],
            ["label" => "Layout", "url" => ["."], "icon" => "ion-ios-home-outline"],
            ["label" => "Error page", "url" => ["."], "icon" => "ion-ios-home-outline"],
            [
                "label"  => "Widgets",
                "icon"   => "ion-ios-home-outlinex",
                "url"    => "#",
                'hasSub' => true,
                "items"  => [
                    ["label" => "Menu", "url" => ["."], 'isSub' => true],
                    ["label" => "Panel", "url" => ["."], 'isSub' => true],
                ],
            ],
            ["label" => "Error page", "url" => ["."], "icon" => "ion-ios-home-outline"],
        ],
    ]
)
?>
    <br>
</div><!-- br-sideleft -->

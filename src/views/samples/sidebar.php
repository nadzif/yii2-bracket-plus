<?php
use akupeduli\bracket\widgets\Sidebar;
use rmrevin\yii\ionicon\Ion;

?>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
<?=Sidebar::widget(
    [
        "items" => [
            ["label" => "Home", "url" => ["site/index"], "icon" => Ion::_IOS_HOME_OUTLINE],
            ["label" => "Test", "url" => ["/test"], "icon" => Ion::_IOS_HOME_OUTLINE],
            ["label" => "Error page", "url" => ["."], "icon" => Ion::_IOS_HOME_OUTLINE],
            [
                "label"  => "Widgets",
                "icon"   => Ion::_IOS_HOME_OUTLINE,
                'hasSub' => true,
                "items"  => [
                    ["label" => "Menu", "url" => ["/test"], 'isSub' => true],
                    ["label" => "Panel", "url" => ["."], 'isSub' => true],
                ],
            ],
            ["label" => "Error page", "url" => ["."], "icon" => Ion::_IOS_HOME_OUTLINE],
        ],
    ]
)
?>
    <br>
</div>

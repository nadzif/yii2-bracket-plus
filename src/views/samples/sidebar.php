<?php
use akupeduli\bracket\widgets\Menu;
?>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
<?=Menu::widget(
    [
        "items"   => [
            ["label" => "Home", "url" => ["."], "icon" => "menu-item-icon tx-24 icon ion-ios-home-outline"],
            ["label" => "Layout", "url" => ["site/layout"], "icon" => "files-o"],
            ["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
            [
                "label" => "Widgets",
                "icon"  => "th",
                "url"   => "#",
                "items" => [
                    ["label" => "Menu", "url" => ["site/menu"]],
                    ["label" => "Panel", "url" => ["site/panel"]],
                ],
            ],
            [
                "label" => "Badges",
                "url"   => "#",
                "icon"  => "table",
                "items" => [
                    [
                        "label" => "Default",
                        "url"   => "#",
                        "badge" => "123",
                    ],
                    [
                        "label"        => "Success",
                        "url"          => "#",
                        "badge"        => "new",
                        "badgeOptions" => ["class" => "label-success"],
                    ],
                    [
                        "label"        => "Danger",
                        "url"          => "#",
                        "badge"        => "!",
                        "badgeOptions" => ["class" => "label-danger"],
                    ],
                ],
            ],
            [
                "label" => "Multilevel",
                "url"   => "#",
                "icon"  => "table",
                "items" => [
                    [
                        "label" => "Second level 1",
                        "url"   => "#",
                    ],
                    [
                        "label" => "Second level 2",
                        "url"   => "#",
                        "items" => [
                            [
                                "label" => "Third level 1",
                                "url"   => "#",
                            ],
                            [
                                "label" => "Third level 2",
                                "url"   => "#",
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'options' => [
            'class' => 'br-menu-item',
        ],
    ]
)
?>
    <br>
</div><!-- br-sideleft -->

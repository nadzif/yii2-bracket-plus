<?php

namespace akupeduli\bracket\widgets;

use akupeduli\bracket\widgets\sidebar\SidebarMenu;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Sidebar extends Widget
{
    public $menu;

    public function run()
    {
        $optionAside = [
            "class" => ["left-sidebar"],
        ];

        echo Html::beginTag("aside", $optionAside);
        if (!is_null($this->menu)) {
            echo Html::beginTag("div", [
                "class" => "scroll-sidebar",
            ]);

            if (!is_null($this->menu)) {
                echo SidebarMenu::widget($this->menu);
            }

            echo Html::endTag("div");
        }
        echo Html::endTag("aside");
    }
}

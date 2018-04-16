<?php
/**
 * @copyright Copyright (c) 2018 PT AKU PEDULI INDONESIA
 */

namespace akupeduli\bracket\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Menu extends \yii\widgets\Menu
{
    public $labelTemplate = '{label}';
    public $linkTemplate = '<a href="{url}" class="{class} {hasSub}">{icon} {attr}</a>';
    public $submenuTemplate = "\n<ul class=\"br-menu-sub\">\n{items}\n</ul>\n";
    public $activateParents = true;

    public function init()
    {
        Html::addCssClass($this->options, 'br-sideleft-menu');
        parent::init();
    }


    protected function renderItem($item)
    {
        $renderedItem = parent::renderItem($item);
        $icon = isset($item['icon']) ? $item['icon'] : null;
        $defaultIcon = "icon {$icon}";

        $hasSub = ArrayHelper::getValue($item, 'hasSub');
        $isSub = ArrayHelper::getValue($item, 'isSub');
        $label = ArrayHelper::getValue($item, 'label');

        return strtr(
            $renderedItem,
            [
                '{class}' => is_null($isSub) ? 'br-menu-link' : 'sub-link',
                '{icon}' => $defaultIcon ? Html::tag('i', null, ['class' => "menu-item-icon tx-24 {$defaultIcon}"]) : '',
                '{attr}' => !$isSub ? Html::tag('span', $label, ['class' => 'menu-item-label']) : $label,
                '{hasSub}' => $hasSub ? 'with-sub' : '',
            ]
        );
    }

    protected function renderItems($items)
    {
        $lines = [];
        foreach ($items as $item) {
            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $menu .= strtr($this->submenuTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }else{
                if($item['active']){
                    Html::addCssClass($this->linkTemplate,'active');
                }
            }

            $isSub = ArrayHelper::getValue($item, 'isSub');
            $lines[] = Html::tag('li', $menu, ['class' => $isSub ? 'sub-item' : 'br-menu-item']);
        }
        return implode("\n", $lines);
    }
}

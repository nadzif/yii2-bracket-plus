<?php
/**
 * @copyright Copyright (c) 2018 PT AKU PEDULI INDONESIA
 */

namespace akupeduli\bracket\widgets;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Menu extends \yii\widgets\Menu
{
    public $labelTemplate = '{label}';
    public $linkTemplate = '<a href="{url}" class="{class} {active} {hasSub}">{icon} {attr}</a>';
    public $submenuTemplate = "\n<ul class='br-menu-sub' {show}>\n{items}\n</ul>\n";
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
                '{active}' => $this->isItemActive($item) ? 'active' : '',
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
                    '{show}' => $item['active'] ? "style='display: block'" : "style='display: none'",
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }

            $isSub = ArrayHelper::getValue($item, 'isSub');
            $lines[] = Html::tag('li', $menu, ['class' => $isSub ? 'sub-item' : 'br-menu-item']);
        }
        return implode("\n", $lines);
    }

    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            $arrayRoute = explode('/', ltrim($route, '/'));
            $arrayThisRoute = explode('/', $this->route);
            if ($arrayRoute[0] !== $arrayThisRoute[0]) {
                return false;
            }
            if (isset($arrayRoute[1]) && $arrayRoute[1] !== $arrayThisRoute[1]) {
                return false;
            }
            if (isset($arrayRoute[2]) && $arrayRoute[2] !== $arrayThisRoute[2]) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }
}

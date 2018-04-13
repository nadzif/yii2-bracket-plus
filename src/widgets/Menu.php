<?php
/**
 * @copyright Copyright (c) 2018 PT AKU PEDULI INDONESIA
 */

namespace akupeduli\bracket\widgets;

use akupeduli\bracket\widgets\icons\Ionic as Fa;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Menu extends \yii\widgets\Menu
{
    public $labelTemplate   = '{label}';
    public $linkTemplate    = '<a href="{url}" class="br-menu-link">{icon}<span class="menu-item-label">{label}</span></a>';
    public $submenuTemplate = "\n<ul class=\"br-menu-sub\">\n{items}\n</ul>\n";
    public $activateParents = true;

    public function init()
    {
        Html::addCssClass($this->options, 'br-sideleft-menu');
        Html::addCssClass($this->itemOptions, 'br-menu-item');

        parent::init();
    }

    protected function renderItem($item)
    {
        $renderedItem = parent::renderItem($item);

        if (isset($item['items'])) {
            $this->linkTemplate = '<a href="{url}" class="br-menu-link with-sub">{icon}<span class="menu-item-label">{label}</span></a>';
        }

        Html::addCssClass($icon, 'menu-item-icon tx-24 icon');
        return strtr(
            $renderedItem,
            [
                '{icon}' => isset($item['icon'])
                ? new Fa($item['icon'], ArrayHelper::getValue($item, 'iconOptions', []))
                : '',
            ]
        );
    }
}

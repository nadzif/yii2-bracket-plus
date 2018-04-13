<?php
/**
 * @copyright Copyright (c) 2018 PT AKU PEDULI INDONESIA
 */

namespace akupeduli\bracket\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Menu extends \yii\widgets\Menu
{
    public $labelTemplate   = '{label}';
    public $linkTemplate    = '<a href="{url}" class="{hasSub} {isSub}">{icon}<span class="menu-item-label">{label}</span></a>';
    public $submenuTemplate = "\n<ul class=\"br-menu-sub\">\n{items}\n</ul>\n";
    public $activateParents = true;

    public function init()
    {
        Html::addCssClass($this->options, 'br-sideleft-menu');
        Html::addCssClass($this->itemOptions, 'br-menu-item');

        parent::init();
    }

    // protected function renderSubItems($items)
    // {
    //     Html::removeCssClass($this->itemOptions, 'br-menu-item');
    //     Html::addCssClass($this->itemOptions, 'sub-item');
    //     $this->linkTemplate = '<a href="{url}" class="sub-link">{icon}{label}</a>';

    //     $renderedItems = [];

    //     foreach ($items as $item) {
    //         $renderedItems[] = $this->renderItem($item);
    //     }

    //     return \implode("\n", $renderedItems);
    // }

    protected function renderItem($item)
    {
        $renderedItem = parent::renderItem($item);
        $icon         = isset($item['icon']) ? $item['icon'] : null;
        $defaultIcon  = "icon {$icon}";

        // $defaultIcon  = null;
        // if ($icon) {
        //     if (\is_string($icon)) {
        //         $defaultIcon = "icon {$icon}";
        //     }

        //     // if (is_array($icon)) {
        //     //     $libs = [
        //     //         'fa' => \akupeduli\bracket\widgets\icons\FontAwesome::class,
        //     //         'sp' => \akupeduli\bracket\widgets\icons\SimpleLine::class,
        //     //     ];

        //     //     if (\in_array($icon['type'], $libs)) {
        //     //         $className   = $libs[$icon['type']];
        //     //         $defaultIcon = new $className($icon['name'], ArrayHelper::getValue($item, 'iconOptions', []));
        //     //     }
        //     // }
        // }
        $hasSub = ArrayHelper::getValue($item, 'hasSub');
        $isSub  = ArrayHelper::getValue($item, 'hasSub');

        if ($isSub) {
            // Html::removeCssClass($this->itemOptions, 'br-menu-item');
            // Html::addCssClass($this->itemOptions, 'sub-item');
            $this->linkTemplate = '<a href="{url}" class="sub-link">{icon}{label}</a>';
        } else {
            // Html::removeCssClass($this->itemOptions, 'sub-item');
            // Html::addCssClass($this->itemOptions, 'br-menu-item');
            // $this->linkTemplate = '<a href="{url}" class="{hasSub} {isSub}">{icon}<span class="menu-item-label">{label}</span></a>';
        }

        return strtr(
            $renderedItem,
            [
                '{icon}'   => $defaultIcon ? Html::tag('i', null, ['class' => "menu-item-icon tx-24 {$defaultIcon}"]) : '',
                '{hasSub}' => $hasSub ? 'with-sub' : 'br-menu-link',
                '{isSub}'  => $isSub ? 'sub-item' : 'br-menu-link',
                // '{subItems}' => $this->renderSubItems(ArrayHelper::getValue($item, 'subItems'))
            ]
        );
    }
}

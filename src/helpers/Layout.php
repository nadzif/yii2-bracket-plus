<?php

namespace akupeduli\bracket\helpers;

use akupeduli\bracket\Bracket;
use yii\helpers\Html;

class Layout
{
    /**
     * Retrieves Html options
     * @param string $tag given tag
     * @param array $options
     * @param boolean $asString if return as string
     * @return array|string
     */
    public static function getHtmlOptions($tag, $options = [], $asString = false)
    {
        $callback = sprintf('static::_%sOptions', strtolower($tag));

        $htmlOptions = call_user_func($callback, $options);

        return $asString ? Html::renderTagAttributes($htmlOptions) : $htmlOptions;
    }

    /**
     * Adds body tag options
     * @param array $options given options
     * @return string | array
     */
    private static function _bodyOptions($options)
    {
        Html::addCssClass($options, 'card-no-border');

        $bracket = Bracket::getComponent();

        if ($bracket->fixHeader) {
            Html::addCssClass($options, 'fix-header');
        }

        if ($bracket->fixSidebar) {
            Html::addCssClass($options, 'fix-sidebar');
        }

        if (is_null($bracket->sidebarFile) and is_null($bracket->sidebarConfig)) {
            Html::addCssClass($options, " single-column");
        }

        return $options;
    }
}

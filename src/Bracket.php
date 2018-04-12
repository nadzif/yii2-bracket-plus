<?php

namespace akupeduli\bracket;

use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

class Bracket extends Component
{
    public static $componentName    = "bracket";
    public static $componentVersion = "1.0";

    /* must be filled */
    public $assetSourcePath;
    public $assetBundleClass;

    /**
     * @var string|array $sidebarConfig
     * @note if $sidebarConfig is string, will be read as path and require it
     */
    public $sidebarConfig;
    public $sidebarFile;
    public $navbarFile;

    public function init()
    {
        if (is_string($this->sidebarConfig)) {
            $this->sidebarConfig = \Yii::getAlias((string) $this->sidebarConfig);
        }
    }
    public static function getComponent()
    {
        try {
            return \Yii::$app->get(self::$componentName);
        } catch (InvalidConfigException $e) {
            $messageError = 'Component name should be set and named "' . self::$componentName . '".';
            throw new InvalidConfigException($messageError);
        }
    }

    public function getAssetPath()
    {
        return $this->assetSourcePath . "/assets";
    }

    public function getSourcePath()
    {
        return $this->assetSourcePath . "/template";
    }

    public function registerAsset($view)
    {
        if ($this->assetSourcePath === null) {
            throw new InvalidConfigException('Please set $assetSourcePath of remark admin template');
        }
        if ($this->assetBundleClass === null) {
            throw new InvalidConfigException('Please set $assetBundleClass property.');
        }

        /** @var AssetBundle $assetBundleClass */
        $assetBundleClass = $this->assetBundleClass;
        $assetBundleClass::register($view);
    }
}

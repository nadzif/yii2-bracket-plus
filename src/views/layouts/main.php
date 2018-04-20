<?php

use yii\helpers\Html;

$this->beginContent(__DIR__ . "/main-core.php");
echo Html::tag("div", $content, ["class" => "br-pagebody"]);
$this->endContent();

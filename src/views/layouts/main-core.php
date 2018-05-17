<?php

use nadzif\bracket\Bracket;
use nadzif\bracket\widgets\SidebarMenu;
use yii\helpers\Html;

$this->beginContent(__DIR__.'/base.php');
$bracket = Bracket::getComponent();
?>
<div class="br-logo">
    <a href=""><span>[</span>bracket <i>plus</i><span>]</span></a>
</div>
<?php
echo $this->render($bracket->sidebarFile);
echo $this->render($bracket->navbarFile);
echo Html::tag("div", $content, ["class" => "br-mainpanel"]);
$this->endContent();

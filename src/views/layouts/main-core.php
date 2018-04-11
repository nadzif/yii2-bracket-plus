<?php

use akupeduli\bracket\assets\core\ImageAsset;
use akupeduli\bracket\Bracket;
use akupeduli\bracket\widgets\Sidebar;

$this->beginContent(__DIR__ . '/base.php');
$image   = ImageAsset::register($this);
$bracket = Bracket::getComponent();
?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php
if ($bracket->navbarFile) {
    echo $this->render($bracket->navbarFile);
}
if ($bracket->sidebarConfig and is_null($bracket->sidebarFile)) {
    echo Sidebar::widget(require ($bracket->sidebarConfig));
} else if ($bracket->sidebarFile) {
    echo $this->render($bracket->sidebarFile);
}
?>
        <div class="page-wrapper">
            <?=$content?>
            <footer class="footer">
                <?=Yii::$app->params["material"]["footer"]?>
            </footer>
        </div>
    </div>
<?php
$this->endContent();

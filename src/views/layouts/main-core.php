<?php

use akupeduli\bracket\Bracket;
use akupeduli\bracket\widgets\SidebarMenu;

$this->beginContent(__DIR__.'/base.php');
$bracket = Bracket::getComponent();
?>
    <div class="br-logo">
        <a href=""><span>[</span>bracket <i>plus</i><span>]</span></a>
    </div>
    <?php
    echo $this->render($bracket->sidebarFile);
    echo $this->render($bracket->navbarFile);
    ?>
    <div class="br-mainpanel">
        <?= $content ?>
    </div>
<?php
$this->endContent();

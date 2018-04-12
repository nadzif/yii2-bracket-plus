<?php

use akupeduli\bracket\Bracket;
use akupeduli\bracket\widgets\Sidebar;

$this->beginContent(__DIR__ . '/base.php');
// $image   = ImageAsset::register($this);
$bracket = Bracket::getComponent();
?>
    <div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
        <?php

if ($bracket->sidebarConfig and is_null($bracket->sidebarFile)) {
    echo Sidebar::widget(require ($bracket->sidebarConfig));
} else if ($bracket->sidebarFile) {
    echo $this->render($bracket->sidebarFile);
} else {
    echo $this->render('../samples/sidebar.php');
}

if (!$bracket->navbarFile) {
    $bracket->navbarFile = '../samples/navbar.php';
}
echo $this->render($bracket->navbarFile);

?>
<div class="br-mainpanel">
      <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Bracket</a>
          <span class="breadcrumb-item active">Blank Page</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
          <h4>Blank Page (Default Layout)</h4>
          <p class="mg-b-0">Introducing Bracket Plus admin template, the most handsome admin template of all time.</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
<?=$content?>
        <!-- start you own content here -->
      </div><!-- br-pagebody -->
<?php
$this->endContent();

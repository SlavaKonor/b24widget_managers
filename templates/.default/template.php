<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

//$this->addExternalCss(SITE_TEMPLATE_PATH . '/css/sidebar.css');

$this->setFrameMode(true);

if (count($arResult['MANAGERS']) < 1) {
    return;
}

$this->SetViewTarget('sidebar', 300);
$frame = $this->createFrame()->begin();
?>

    <div class="sidebar-widget sidebar-widget-birthdays">
        <div class="sidebar-widget-top">
            <div class="sidebar-widget-top-title"><?= Loc::getMessage('WIDGET_BIRTHDAY_TITLE') ?></div>
        </div>
        <div class="sidebar-widget-content">
            <?php

            foreach ($arResult["MANAGERS"] as $manager) {
                echo $manager . "<br />";
            }
            ?>
        </div>
    </div>

<?php
$frame->end();
$this->EndViewTarget();
?>
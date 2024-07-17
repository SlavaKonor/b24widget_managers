<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

$this->addExternalCss('./sidebar.css');

$this->setFrameMode(true);

if (count($arResult['MANAGERS']) < 1) {
    return;
}

$this->SetViewTarget('sidebar', 301);
$frame = $this->createFrame()->begin();
?>

    <div class="sidebar-widget sidebar-widget-managers">
        <div class="sidebar-widget-top">
            <div class="sidebar-widget-top-title"><?= Loc::getMessage('WIDGET_MANAGERS_TITLE') ?></div>
        </div>
        <div class="sidebar-widget-content">
            <?php

            foreach ($arResult["MANAGERS"] as $manager) :?>

                <a href="/company/personal/user/<?= $manager["ID"] ?>>/"
                   class="sidebar-widget-item --row widget-last-item">
                    <span class="sidebar-user-info">
				        <span class="manager-name"><?= $manager["NAME"] ?></span>
                        <span class="manager-department">(<?= $manager["DEPARTAMENT"] ?>)</span>
			        </span>
                </a>
            <?
            endforeach;
            ?>


        </div>
    </div>

<?php
$frame->end();
$this->EndViewTarget();
?>
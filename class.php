<?php

//use Bitrix\Main;
use Bitrix\Iblock\Model\Section;
use Bitrix\Main\UserTable;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

\Bitrix\Main\Loader::includeModule('iblock');


class CManagersWidget extends \CBitrixComponent
{
    function getManagers()
    {
        $entity = Section::compileEntityByIblock(3);

        $rsSection = $entity::getList(array(

            "filter" => array(
                "IBLOCK_ID" => 3,
                "ACTIVE" => "Y",
            ),

            "select" => array("ID", "UF_HEAD", "NAME"),

        ));

        while ($arSection = $rsSection->fetch()) {
            if (isset($arSection["UF_HEAD"]) && !empty($arSection["UF_HEAD"])) {
                $user = UserTable::GetList([
                        "filter" => ["ID" => $arSection["UF_HEAD"]],
                        "select" => ["NAME", "LAST_NAME"]
                    ]
                )->Fetch();
                $this->arResult["MANAGERS"][$arSection["ID"]] = [
                    "NAME" => $user["NAME"] . " " . $user["LAST_NAME"],
                    "ID" => $arSection["UF_HEAD"],
                    "DEPARTAMENT" => $arSection["NAME"]
                ];
                var_dump($user);
            }
        }
    }

    function executeComponent()
    {
        $this->getManagers();

        if ($this->startResultCache()) {

            $this->includeComponentTemplate();
        }
        return $this->arResult["Y"];
    }

}

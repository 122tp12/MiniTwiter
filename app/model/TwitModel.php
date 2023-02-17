<?php

namespace model;

use shared\DTO\TwitDTO;
use \Datetime;
use \DateTimeZone;

include_once "././shared/DTO/TwitDTO.php";

class TwitModel extends \shared\BasicModel
{
    public function GetMyTwits(): array
    {
        $twits = $this->RunQuery("SELECT * FROM `twit` WHERE `userId`=:id ORDER BY `datePublish` DESC",["id"=>$_SESSION["user"]]);
        $result=[];

        foreach ($twits as $twit){
            $user=$this->getUser($_SESSION["user"])[0];
            $result[]=new TwitDTO($twit["id"],$user["id"], $user["name"], $twit["title"], $twit["datePublish"], $twit["text"]);
        }
        return $result;
    }
    public function AddMyTwit($title, $text){
        $dt=new DateTime('now', new DateTimeZone('Europe/Kyiv'));
        return $this->RunQuery("INSERT INTO `twit` (`title`, `text`, `datePublish`, `userId`) VALUES ( :title, :text, :date, :id)", ["title"=>$title, "text"=>$text, "date"=>$dt->format("Y-m-d H:i:s"), "id"=>$_SESSION["user"]]);
    }
    public function EditMyTwit($id, $idUser, $title, $text){
        return $this->RunQuery("UPDATE `twit` SET `title`=:title,`text`=:text WHERE `id`=:id and `userId`=:user", ["title"=>$title, "text"=>$text, "id"=>$id, "user"=>$idUser]);
    }
}
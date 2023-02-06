<?php

namespace model;

use shared\DTO\TwitDTO;

include_once "shared\DTO\TwitDTO.php";
include_once "shared\BasicModel.php";

class MainModel extends \shared\BasicModel
{
    public function GetTwits($start): array
    {
        $twits = $this->RunQuery("SELECT * FROM `twit` ORDER BY `datePublish` DESC LIMIT 5 OFFSET ?", [$start]);
        $result=[];
        foreach ($twits as $twit){
            $user=$this->getUser($twit["userId"])[0];
            $result[] = new TwitDTO($twit["id"], $user["id"], $user["name"], $twit["title"], $twit["datePublish"], $twit["text"]);
        }

        return $result;
    }
    public function GetTwitsOfUser($start, $userId): array
    {
        $twits = $this->RunQuery("SELECT * FROM `twit` WHERE `userId`=? ORDER BY `datePublish` DESC LIMIT 5 OFFSET ?", [$userId, $start]);
        $result=[];

        foreach ($twits as $twit){
            $user=$this->getUser($twit["userId"])[0];
            $result[] = new TwitDTO($twit["id"], $user["id"], $user["name"], $twit["title"], $twit["datePublish"], $twit["text"]);
        }

        return $result;
    }
    function GetAllTwitsCount($id=null){
        if($id==null)
            $users = $this->RunQuery("SELECT count(*) FROM `twit`");
        else
            $users = $this->RunQuery("SELECT count(*) FROM `twit` WHERE `userId`=?", [$id]);
        return $users[0][0];
    }
}
<?php

namespace model;

use shared\DTO\TwitDTO;

include_once "shared\DTO\TwitDTO.php";
include_once "shared\BasicModel.php";

class MainModel extends \shared\BasicModel
{
    public function GetTwits($start): array
    {
        $twits = $this->RunQuery("SELECT * FROM `twit` ORDER BY `datePublish` DESC LIMIT ".$start.", ".(5).";");
        $result=[];

        for($i=0;$i<$twits->num_rows;$i++){
            $twits->data_seek($i);
            $currentTweet= $twits->fetch_array();
            $user=$this->getUser($currentTweet["userId"]);
            $result[$i]=new TwitDTO($user["id"], $user["id"], $user["name"], $currentTweet["title"], $currentTweet["datePublish"], $currentTweet["text"]);
        }
        return $result;
    }
    public function GetTwitsOfUser($start, $userId): array
    {
        $twits = $this->RunQuery("SELECT * FROM `twit` WHERE `userId`=".$userId." ORDER BY `datePublish` DESC LIMIT ".($start).", ".(5).";");
        $result=[];

        for($i=0;$i<$twits->num_rows;$i++){
            $twits->data_seek($i);
            $currentTweet= $twits->fetch_array();
            $user=$this->getUser($currentTweet["userId"]);
            $result[$i]=new TwitDTO($user["id"], $user["id"], $user["name"], $currentTweet["title"], $currentTweet["datePublish"], $currentTweet["text"]);
        }
        return $result;
    }
    function GetAllTwitsCount($id=null){
        if($id==null)
            $users = $this->RunQuery("SELECT count(*) FROM `twit`");
        else
            $users = $this->RunQuery("SELECT count(*) FROM `twit` WHERE `userId`=".$id);

        return $users->fetch_array();
    }
}
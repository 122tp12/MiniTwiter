<?php

namespace model;

use shared\DTO\TwitDTO;

include_once "shared\DTO\TwitDTO.php";

class TwitModel extends \shared\BasicModel
{
    public function GetMyTwits(): array
    {
        $twits = $this->RunQuery("SELECT * FROM `twit` WHERE `userId`=".$_SESSION["user"]);
        $result=[];

        for($i=0;$i<$twits->num_rows;$i++){
            $twits->data_seek($i);
            $currentTweet= $twits->fetch_array();
            $user=$this->getUser($_SESSION["user"]);
            $result[$i]=new TwitDTO($currentTweet["id"],$user["id"], $user["name"], $currentTweet["title"], $currentTweet["datePublish"], $currentTweet["text"]);
        }
        return $result;
    }
    public function AddMyTwit($title, $text){
        return $this->RunQuery("INSERT INTO `twit` (`title`, `text`, `datePublish`, `userId`) VALUES ( \"".$title."\", \"".$text."\", \"".date("Y-m-d H:i:s")."\", \"".$_SESSION["user"]."\");");
    }
    public function EditMyTwit($id, $idUser, $title, $text){
        return $this->RunQuery("UPDATE `twit` SET `title`='".$title."',`text`='".$text."' WHERE `id`=".$id." and `userId`=".$idUser);
    }
}
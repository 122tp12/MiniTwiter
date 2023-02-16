<?php

namespace shared\DTO;

class TwitDTO
{
    public $twitId;
    public $userId;
    public $userName;
    public $title;
    public $date;
    public $text;

    public function __construct($twitId_, $userId_, $userName_, $title_, $date_,$text_)
    {
        $this->twitId=$twitId_;
        $this->userId=$userId_;
        $this->userName=$userName_;
        $this->title=$title_;
        $this->date=$date_;
        $this->text=$text_;
    }
}
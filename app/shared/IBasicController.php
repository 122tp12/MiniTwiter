<?php

namespace shared;

interface IBasicController
{
    public function redirect($address, $message=null);
}
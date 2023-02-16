<?php

namespace shared;

include_once "IBasicLayout.php";

abstract class BasicLayout implements IBasicLayout
{
    public abstract function Begin($title);
    public abstract function End();
}
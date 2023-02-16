<?php

namespace shared;

interface IBasicModel
{
    function Connect();
    function RunQuery($sql, $param);
}
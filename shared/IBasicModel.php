<?php

namespace shared;

interface IBasicModel
{
    function Connect($database);
    function CloseConnection();
    function RunQuery($sql);
}
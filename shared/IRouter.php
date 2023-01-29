<?php

namespace shared;

interface IRouter
{
    public function AddRoute(string $address, $controller, $action);
    public function Run(string $request);
}
<?php

function route_name()
{
    return str_replace('.', '-', \Illuminate\Support\Facades\Route::currentRouteName());
}
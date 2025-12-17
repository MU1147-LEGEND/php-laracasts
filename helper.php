<?php

function dd($value)
{
    echo "<pre style='font-size:26px;margin:20px 100px;'>";
    var_dump($value);
    echo "</pre>";
    die();
}

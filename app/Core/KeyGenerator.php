<?php


namespace App\Core;


class KeyGenerator
{

    function getKey(): string {
        return uniqid('QK', false);
    }

}

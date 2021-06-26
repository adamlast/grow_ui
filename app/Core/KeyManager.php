<?php


namespace App\Core;

use App\Models\Access_mapping;

class KeyManager
{

    function getURL(string $device_id): string {

        $baseUrl = 'http://grui-qr-server.steelyglint.com:8000/config/key/';
        $generator = new KeyGenerator();
        $key = $generator->getKey();

        // Persist the mapping between device_id and key
        $mapping = new Access_mapping();
        $mapping->device_id = $device_id;
        $mapping->key = $key;
        $mapping->save();

        return $baseUrl.$key;
    }

}

<?php

declare(strict_types=1);

namespace App;

class Weather
{

    public function __construct(public string $apiKey)
    {
        
    }


    public function isSunnyTomorrow(){
        return true;
    }
}

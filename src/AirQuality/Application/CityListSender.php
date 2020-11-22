<?php
declare(strict_types=1);

namespace App\AirQuality\Application;

final class CityListSender 
{

    public function __invoke()
    {
        $cities = [];
        
        $listHandler = fopen(getcwd() . '/files/world_cities.csv', "r");
        
        while (($data = fgetcsv($listHandler, 1000, ",")) !== FALSE) 
        {		
            $cities[] = $data[0];
        }
        fclose($listHandler);

        sort($cities);
        
        return $cities;
    }
}

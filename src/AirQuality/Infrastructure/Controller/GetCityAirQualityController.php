<?php 

declare(strict_types=1);

namespace App\AirQuality\Infrastructure\Controller;

use App\AirQuality\Application\AirQualityFinder;
use App\AirQuality\Application\CityListSender;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

final class GetCityAirQualityController extends AbstractController
{
    private $finder; 
    private $cities; 

    public function __construct(AirQualityFinder $airQualityFinder, CityListSender $cityListSender)
    {
        $this->finder = $airQualityFinder;
        $this->cities = $cityListSender->__invoke();
    }

    public function __invoke(Request $request)
    {
        $query = $request->request->get('search');
        $json = $this->finder->__invoke($query);
        
        return $this->render('search.html.twig', [
            'object' => json_decode($json),
            'cities' => $this->cities
        ]);   
    }
}
<?php 

declare(strict_types=1);

namespace App\AirQuality\Infrastructure\Controller;

use App\AirQuality\Application\AirQualityFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

final class GetCityAirQualityController extends AbstractController
{
    private $finder; 

    public function __construct(AirQualityFinder $airQualityFinder)
    {
        $this->finder = $airQualityFinder;
    }

    public function __invoke(Request $request)
    {
        $query = $request->request->get('search');
        $json = $this->finder->__invoke($query);
        
        return $this->render('home/search.html.twig', [
            'object' => json_decode($json),
            'cities' => [] 
        ]);   
    }
}
<?php 

declare(strict_types=1);

namespace App\AirQuality\Infrastructure\Controller;

use App\AirQuality\Application\CityListSender;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class GetAirQualityIndexController extends AbstractController
{
    
    public function __construct(CityListSender $cityListSender)
    {
        $this->cities = $cityListSender->__invoke();
    }
    
    public function __invoke()
    {
        return $this->render('index.html.twig', [
            'cities' => $this->cities 
        ]);
    }
}
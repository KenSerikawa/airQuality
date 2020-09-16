<?php

namespace App\Controller;

use App\Service\AirQualityFinder;
use App\Service\CityListSender;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    public $client;
    public $cities;

    public function __construct(CityListSender  $cityListSender)
    {
        $this->cities = $cityListSender->__invoke();
    }
    public function index(Request $request)
    {
        return $this->render('home/index.html.twig', [
            'cities' => $this->cities 
        ]);
    }

    public function search(Request $request, AirQualityFinder $airQualityFinder)
    {
        $query = $request->request->get('search');
        $json = $airQualityFinder($query);
        $data = json_decode($json);
        return $this->render('home/search.html.twig', [
            'object' => $data,
            'cities' => $this->cities 
        ]);
    }
}

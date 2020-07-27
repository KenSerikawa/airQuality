<?php

namespace App\Controller;

use App\Service\AirQualityRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    public $client;

    public function index(Request $request)
    {
        
        return $this->render('home/index.html.twig', [
           
        ]);
    }

    public function search(Request $request, AirQualityRequest $airQualityRequest)
    {
        $query = $request->request->get('search');
        $json = $airQualityRequest($query);
        $data = json_decode($json);
        return $this->render('home/search.html.twig', [
            'object' => $data
        ]);
    }
}

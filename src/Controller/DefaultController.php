<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use WeatherModel;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(): Response
    {
        $weatherData = WeatherModel::getWeatherData();
        dump($weatherData);
        return $this->render(
            'default/index.html.twig',
            [
                'title' => 'Bienvenue sur la météo des villes !',
                'content' => $weatherData
            ]
        );
    }
}

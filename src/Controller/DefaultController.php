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
    /**
     * @Route("/montagnes", name="mountains", methods={"GET"})
     */
    public function mountains(): Response
    {
        return $this->render(
            'default/locations.html.twig',
            [
                'title' => 'La météo des montagnes',
                'content' => [
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eaque vitae maiores numquam suscipit nobis temporibus facilis! Facilis autem deserunt omnis enim ex voluptate facere minus tenetur. Cupiditate, illum doloremque.'
                ]
            ]
        );
    }

    /**
     * @Route("/plages", name="beaches", methods={"GET"})
     */
    public function beaches(): Response
    {
        return $this->render(
            'default/locations.html.twig',
            [
                'title' => 'La météo des plages',
                'content' => [
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eaque vitae maiores numquam suscipit nobis temporibus facilis! Facilis autem deserunt omnis enim ex voluptate facere minus tenetur. Cupiditate, illum doloremque.',
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eaque vitae maiores numquam suscipit nobis temporibus facilis! Facilis autem deserunt omnis enim ex voluptate facere minus tenetur. Cupiditate, illum doloremque.'
                ]
            ]
        );
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use WeatherModel;

class WeatherController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function homepage(): Response
    {
        $weatherData = WeatherModel::getWeatherData();
        return $this->render(
            'weather/index.html.twig',
            [
                'title' => 'Bienvenue sur la météo des villes !',
                'content' => $weatherData,
            ]
        );
    }

    /**
     * @Route("/montagnes", name="mountains", methods={"GET"})
     */
    public function mountains(): Response
    {
        return $this->render(
            'weather/locations.html.twig',
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
            'weather/locations.html.twig',
            [
                'title' => 'La météo des plages',
                'content' => [
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eaque vitae maiores numquam suscipit nobis temporibus facilis! Facilis autem deserunt omnis enim ex voluptate facere minus tenetur. Cupiditate, illum doloremque.',
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eaque vitae maiores numquam suscipit nobis temporibus facilis! Facilis autem deserunt omnis enim ex voluptate facere minus tenetur. Cupiditate, illum doloremque.'
                ]
            ]
        );
    }

    /**
     * @Route("/city/{id}", name="city_select", methods={"GET"}, requirements={ "id" = "\d+"})
     */
    public function selectCity(int $id, SessionInterface $session): Response
    {
        $cityWeather = WeatherModel::getWeatherByCityIndex($id);
        $session->set('selectedCity', $cityWeather);
        dump($cityWeather);
        return $this->redirectToRoute('homepage');
    }
}

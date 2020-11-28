<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use WeatherModel;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(SessionInterface $session): Response
    {
        $weatherData = WeatherModel::getWeatherData();
        $selectedCity = $session->get('selectedCity');
        dump($selectedCity);
        return $this->render(
            'default/index.html.twig',
            [
                'title' => 'Bienvenue sur la météo des villes !',
                'content' => $weatherData,
                'selectedCity' => $selectedCity
            ]
        );
    }

    /**
     * @Route("/montagnes", name="mountains", methods={"GET"})
     */
    public function mountains(SessionInterface $session): Response
    {
        $selectedCity = $session->get('selectedCity');

        return $this->render(
            'default/locations.html.twig',
            [
                'title' => 'La météo des montagnes',
                'selectedCity' => $selectedCity,
                'content' => [
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eaque vitae maiores numquam suscipit nobis temporibus facilis! Facilis autem deserunt omnis enim ex voluptate facere minus tenetur. Cupiditate, illum doloremque.'
                ]
            ]
        );
    }

    /**
     * @Route("/plages", name="beaches", methods={"GET"})
     */
    public function beaches(SessionInterface $session): Response
    {
        $selectedCity = $session->get('selectedCity');

        return $this->render(
            'default/locations.html.twig',
            [
                'title' => 'La météo des plages',
                'selectedCity' => $selectedCity,
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

<?php

namespace App\Controller;

use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchHomeController extends AbstractController
{
    #[Route('/', name: 'app_search_home')]
    public function index(CityRepository $repository): Response
    {
        $city = $repository->findSearch();
        return $this->render('search_home/index.html.twig', [
            'city' => $city,
        ]);
    }
}

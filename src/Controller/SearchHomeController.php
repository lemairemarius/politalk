<?php

namespace App\Controller;

use App\Data\SearchDataCity;
use App\Form\SearchForm;
use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchHomeController extends AbstractController
{
    #[Route('/', name: 'app_search_home')]
    public function index(CityRepository $repository, Request $request): Response
    {
        $data = new SearchDataCity();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $city = $repository->findSearch($data);
        return $this->render('search_home/index.html.twig', [
            'city' => $city,
            'form' => $form->createView()
        ]);
    }
}

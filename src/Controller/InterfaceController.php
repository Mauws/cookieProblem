<?php

namespace App\Controller;

use App\Factory\ServiceFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class InterfaceController extends AbstractController
{
    public function __construct(public readonly ServiceFactory $serviceFactory){}

    #[Route('/', methods: ["GET"])]
    public function indexRedirectAction() {
        return $this->redirect('/bestCookie');
    }

    #[Route('/bestCookie', methods: ["GET"])]
    public function calculateBestCookieAction($score = false): Response
    {
        return $this->render('bestCookieScore.html.twig', [
            "bestCookie" => false,
            "scoops" => 100
        ]);
    }

    #[Route('/bestCookieByCalories', methods: ["GET"])]
    public function calculateBestCookieByCaloriesAction($score = false): Response
    {
        return $this->render('bestScoreByCalories.html.twig', [
            "bestCookieWithCaloryLimit" => false,
            "scoops" => 100,
            "calories" => 500
        ]);
    }
}
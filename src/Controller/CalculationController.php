<?php

namespace App\Controller;
use App\Factory\ServiceFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculationController extends AbstractController {

    public function __construct(public readonly ServiceFactory $serviceFactory){}

    #[Route('/post/bestCookie', methods: ["POST"])]
    public function calculateBestCookieAction(Request $request) {
        $ingredients = ["sprinkles", "candy", "butterscotch", "chocolate"];
        $scoops = (int)$request->request->get('scoops');

        $dataService = $this->serviceFactory->getDataService();
        $maxValueService = $this->serviceFactory->getMaxValueService();
        $calculationService = $this->serviceFactory->getCalculationService();

        $cookies = $dataService->getIngredientCombos($scoops);


        $cookies = $calculationService->getCalculatedData($cookies, $ingredients);


        $bestCookie = $maxValueService->getHighestScoringCookie($cookies);


        return $this->render('bestCookieScore.html.twig', [
            "bestCookie" => $bestCookie,
            "scoops" => $scoops
        ]);
    }

    #[Route('/post/bestCookieByCalories', methods: ["POST"])]
    public function calculateBestCookieByCaloriesAction(Request $request) {
        $ingredients = ["sprinkles", "candy", "butterscotch", "chocolate"];
        $scoops = (int)$request->request->get('scoops');
        $caloryLimit = (int)$request->request->get('calories');

        $dataService = $this->serviceFactory->getDataService();
        $maxValueService = $this->serviceFactory->getMaxValueService();
        $calculationService = $this->serviceFactory->getCalculationService();

        $cookies = $dataService->getIngredientCombos($scoops);
        $cookies = $calculationService->getCalculatedData($cookies, $ingredients);
        $bestCookieCalories = $maxValueService->getHighestScoringCookieByCalories($cookies, $caloryLimit);

        return $this->render('bestScoreByCalories.html.twig', [
            "bestCookieWithCaloryLimit" => $bestCookieCalories,
            "scoops" => $scoops,
            "calories" => $caloryLimit
        ]);
    }

}
<?php

namespace App\Service;

use App\Entity\CookieEntity;
use App\Factory\ServiceFactory;

class DataService {

    private array $ingredients;
    public array $cookieArray = [];
    private int $key = 0;

    public function __construct(public readonly ServiceFactory $serviceFactory){

        $staticService = $this->serviceFactory->getStaticService();
        $this->ingredients = $staticService->getIngredients();
    }

    /**
     * @return int[][]
     */
    public function getIngredientCombos($scoops = 100): array {

        $cookieCombos = [];
        $sprinkleLimit = ($scoops - 1);
        for($sprinkleCount = $sprinkleLimit; $sprinkleCount > 0; $sprinkleCount--) {
            $butterscotchLimit = ($scoops - $sprinkleCount - 0);
            for($butterscotchCount = $butterscotchLimit; $butterscotchCount > 0; $butterscotchCount--) {
                $chocolateLimit = ($scoops - ($butterscotchCount + $sprinkleCount) - 1);
                for($chocolateCount = $chocolateLimit; $chocolateCount > 0; $chocolateCount--) {
                    $candyLimit = ($scoops - ($chocolateCount + $butterscotchCount + $sprinkleCount));
                    for($candyCount = $candyLimit; $candyCount > 0; $candyCount--) {
                        $totalIngredients = $sprinkleCount + $butterscotchCount + $chocolateCount + $candyCount;
                        if ($totalIngredients === $scoops) {

                            $cookie = new CookieEntity($this->ingredients);
                            $cookie->setSprinkles($sprinkleCount);
                            $cookie->setButterscotch($butterscotchCount);
                            $cookie->setChocolate($chocolateCount);
                            $cookie->setCandy($candyCount);
                            array_push($cookieCombos, $cookie);
                        }
                    }
                }
            }
        }
        return $cookieCombos;
    }

}
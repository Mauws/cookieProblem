<?php

namespace App\Service;

use App\Entity\IngredientPropertyEntity;
use App\Factory\ServiceFactory;

class StaticService {

    public function __construct(public readonly ServiceFactory $serviceFactory){}

    public function getIngredients() {
        $ingredients = [];

        $sprinkles = new IngredientPropertyEntity();
        $sprinkles->setCapacity(2);
        $sprinkles->setDurability(0);
        $sprinkles->setFlavor(-2);
        $sprinkles->setTexture(0);
        $sprinkles->setCalories(3);

        $ingredients["sprinkles"] = $sprinkles;

        $butterscotch = new IngredientPropertyEntity();
        $butterscotch->setCapacity(0);
        $butterscotch->setDurability(5);
        $butterscotch->setFlavor(-3);
        $butterscotch->setTexture(0);
        $butterscotch->setCalories(3);

        $ingredients["butterscotch"] = $butterscotch;

        $chocolate = new IngredientPropertyEntity();
        $chocolate->setCapacity(0);
        $chocolate->setDurability(0);
        $chocolate->setFlavor(5);
        $chocolate->setTexture(-1);
        $chocolate->setCalories(8);

        $ingredients["chocolate"] = $chocolate;

        $candy = new IngredientPropertyEntity();
        $candy->setCapacity(0);
        $candy->setDurability(-1);
        $candy->setFlavor(0);
        $candy->setTexture(5);
        $candy->setCalories(8);

        $ingredients["candy"] = $candy;

        return $ingredients;
    }

}
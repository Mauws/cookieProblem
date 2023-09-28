<?php

namespace App\Service;

use App\Factory\ServiceFactory;

class CalculationService {

    public function __construct(public readonly ServiceFactory $serviceFactory){}

    public function getCalculatedData(array $cookies, $ingredients): array {
        $cookies = $this->calculateScore($cookies, $ingredients);
        $cookies = $this->calculateCalories($cookies, $ingredients);
        return $cookies;
    }

    public function calculateCalories(array $cookies, array $ingredients): array {
        foreach ($cookies as $cookie) {

            $caloriesByIngredient = [];
            foreach ($ingredients as $ingredient) {
                $caloriesByIngredient[] = $cookie->getPropertyByName($ingredient) * $cookie->getIngredients()[$ingredient]->getCalories();
            }
            $totalCalories = array_sum($caloriesByIngredient);
            $cookie->setCalories($totalCalories);
        }

        return $cookies;
    }

    public function calculateScore(array $cookies, array $ingredients): array {

        foreach($cookies as $cookie) {

            $capacityByIngredient = [];
            foreach ($ingredients as $ingredient) {
                $capacityByIngredient[] = $cookie->getPropertyByName($ingredient) * $cookie->getIngredients()[$ingredient]->getCapacity();
            }
            $capacity = array_sum($capacityByIngredient);

            $durabilityByIngredient = [];
            foreach ($ingredients as $ingredient) {
                $durabilityByIngredient[] = $cookie->getPropertyByName($ingredient) * $cookie->getIngredients()[$ingredient]->getDurability();
            }
            $durability = array_sum($durabilityByIngredient);

            $flavorByIngredient = [];
            foreach ($ingredients as $ingredient) {
                $flavorByIngredient[] = $cookie->getPropertyByName($ingredient) * $cookie->getIngredients()[$ingredient]->getFlavor();
            }
            $flavor = array_sum($flavorByIngredient);

            $textureByIngredient = [];
            foreach ($ingredients as $ingredient) {
                $textureByIngredient[] = $cookie->getPropertyByName($ingredient) * $cookie->getIngredients()[$ingredient]->getTexture();
            }
            $texture = array_sum($textureByIngredient);

            $score = $capacity * $durability * $flavor * $texture;
            $cookie->setScore($score);
        }
        return $cookies;
    }

}
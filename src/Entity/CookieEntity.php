<?php

namespace App\Entity;


class CookieEntity {

    private int $sprinkles;
    private int $butterscotch;
    private int $chocolate;
    private int $candy;

    private array $ingredients;

    private int $score;
    private int $calories;

    public function __construct(array $ingredients)
    {
        $this->setIngredients($ingredients);
    }

    public function getPropertyByName($name) {
        return $this->{$name};
    }

    /**
     * @return int
     */
    public function getSprinkles(): int
    {
        return $this->sprinkles;
    }

    /**
     * @param int $sprinkles
     */
    public function setSprinkles(int $sprinkles): void
    {
        $this->sprinkles = $sprinkles;
    }

    /**
     * @return int
     */
    public function getButterscotch(): int
    {
        return $this->butterscotch;
    }

    /**
     * @param int $butterscotch
     */
    public function setButterscotch(int $butterscotch): void
    {
        $this->butterscotch = $butterscotch;
    }

    /**
     * @return int
     */
    public function getChocolate(): int
    {
        return $this->chocolate;
    }

    /**
     * @param int $chocolate
     */
    public function setChocolate(int $chocolate): void
    {
        $this->chocolate = $chocolate;
    }

    /**
     * @return int
     */
    public function getCandy(): int
    {
        return $this->candy;
    }

    /**
     * @param int $candy
     */
    public function setCandy(int $candy): void
    {
        $this->candy = $candy;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * @param array $ingredients
     */
    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getCalories(): int
    {
        return $this->calories;
    }

    /**
     * @param int $calories
     */
    public function setCalories(int $calories): void
    {
        $this->calories = $calories;
    }
}
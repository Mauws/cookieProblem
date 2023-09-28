<?php

namespace App\Service;

use App\Entity\CookieEntity;
use App\Factory\ServiceFactory;

class MaxValueService {

    public function __construct(public readonly ServiceFactory $serviceFactory){}

    public function getHighestScoringCookie(array $cookies): CookieEntity {
        $maxCookie = false;
        foreach($cookies as $cookie) {
            if($maxCookie === false) {
                $maxCookie = $cookie;
            }
            if($cookie->getScore() > $maxCookie->getScore()) {
                $maxCookie = $cookie;
            }
        }
        return $maxCookie;
    }

    public function getHighestScoringCookieByCalories(array $cookies, int $calories): CookieEntity {
        $bestCookieByCalories = false;
        foreach($cookies as $cookie) {
            if($bestCookieByCalories === false && $cookie->getCalories() <= $calories) {
                $bestCookieByCalories = $cookie;
            }
            if(($cookie->getScore() > $bestCookieByCalories->getScore())  && $cookie->getCalories() <= $calories) {
                $bestCookieByCalories = $cookie;
            }
        }
        return $bestCookieByCalories;
    }

}
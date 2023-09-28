<?php

namespace App\Factory;

use App\Service\CalculationService;
use App\Service\DataService;
use App\Service\MaxValueService;
use App\Service\StaticService;

class ServiceFactory {

    public function getDataService(): DataService {
        return new DataService($this);
    }

    public function getMaxValueService(): MaxValueService {
        return new MaxValueService($this);
    }

    public function getCalculationService(): CalculationService {
        return new CalculationService($this);
    }

    public function getStaticService(): StaticService {
        return new StaticService($this);
    }

}
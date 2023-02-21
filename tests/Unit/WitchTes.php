<?php

namespace Tests\Unit;

use App\Http\Controllers\VillagerController;
use App\Http\Controllers\WitchProblemSolverController;
use PHPUnit\Framework\TestCase;

class WitchTes extends TestCase
{
    public function testExample()
    {
               
        $witchProblemSolver = new WitchProblemSolverController();
        $personA = new VillagerController(12, 10);
        $personB = new VillagerController(17, 13);
        return  $witchProblemSolver->solve($personA, $personB);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\VillagerController;
use App\Http\Controllers\WitchProblemSolverController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Ramsey\Uuid\Type\Integer;

class WitchController extends Controller
{
    private $killCounts;

    function __construct() 
    {
        $this->killCounts = array();
    }

    public function getKillCount($year) : int 
    {
        if ($year <= 0) {
            return -1;
        }
        if (!array_key_exists($year, $this->killCounts)) {
            $this->killCounts[$year] = $this->calculateKillCount($year);
        }
        return $this->killCounts[$year];
    }

    private function calculateKillCount($year) : int 
    {
        $killCount = 0;
        for ($i = 1; $i <= $year; $i++) {
            $killCount += $i;
        }
        return $killCount;
    }

    public function testWitch() : JsonResponse
    {
        $personA = new VillagerController(12, 10); 
        $personB = new VillagerController(17, 13);
        $average  = $witchProblemSolver = (new WitchProblemSolverController)->solve($personA, $personB);

        return response()->json([
            "average" => $average,
        ],200);

    }
}

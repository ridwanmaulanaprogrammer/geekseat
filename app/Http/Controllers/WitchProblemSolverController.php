<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WitchController;

class WitchProblemSolverController extends Controller
{
    private $witch;

    function __construct() {
        $this->witch = new WitchController();
    }

    public function solve($personA, $personB) {
        $yearOfBirthA = $personA->getYearOfBirth();
        $yearOfBirthB = $personB->getYearOfBirth();
        if ($yearOfBirthA == -1 || $yearOfBirthB == -1) {
            return -1;
        }
        $killCountA = $this->witch->getKillCount($yearOfBirthA);
        $killCountB = $this->witch->getKillCount($yearOfBirthB);
        $averageKillCount = ($killCountA + $killCountB) / 2;
        return $averageKillCount;
    }
}

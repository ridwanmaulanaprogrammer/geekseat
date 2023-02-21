This is for repo geekseat test

i have 3 controller for solving problem witch with namespace App\Http\Controllers;
- WitchController
- VillagerController
- WitchProblemSolverController



You can clone or pull this repo and then for tes this task, hit with insomnia or postman in endpoint below using GET
- http://127.0.0.1:8000/testWitch

OR You Can see code in bellow

WitchController
- This is First object, a die hard programmer, you can scary see this.. hoaaaaaaa
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\VillagerController;
use App\Http\Controllers\WitchProblemSolverController;

class WitchController extends Controller
{
    private $killCounts;

    function __construct() {
        $this->killCounts = array();
    }

    public function getKillCount($year) {
        if ($year <= 0) {
            return -1;
        }
        if (!array_key_exists($year, $this->killCounts)) {
            $this->killCounts[$year] = $this->calculateKillCount($year);
        }
        return $this->killCounts[$year];
    }

    private function calculateKillCount($year) {
        $killCount = 0;
        for ($i = 1; $i <= $year; $i++) {
            $killCount += $i;
        }
        return $killCount;
    }

    public function testWitch(){
        $personA = new VillagerController(12, 10); 
        $personB = new VillagerController(17, 13);
        return $witchProblemSolver = (new WitchProblemSolverController)->solve($personA, $personB);
    }
}

```

then
- VillagerController, poor because people will die.....
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillagerController extends Controller
{
    private $yearOfDeath;
    private $ageOfDeath;
  
    function __construct($yearOfDeath, $ageOfDeath) {
        $this->yearOfDeath = $yearOfDeath;
        $this->ageOfDeath = $ageOfDeath;
    }
  
    public function getYearOfBirth() {
        $yearOfBirth = $this->yearOfDeath - $this->ageOfDeath;
        if ($yearOfBirth <= 0) {
            return -1;
        }
        return $yearOfBirth;
    }
}

```

then 
- last, me -> problem solver, cooolllll
```
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

```



Thanks in advance

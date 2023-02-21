<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillagerController extends Controller
{
    private $yearOfDeath;
    private $ageOfDeath;
  
    function __construct($yearOfDeath, $ageOfDeath) 
    {
        $this->yearOfDeath = $yearOfDeath;
        $this->ageOfDeath = $ageOfDeath;
    }
  
    public function getYearOfBirth() : int 
    {
        $yearOfBirth = $this->yearOfDeath - $this->ageOfDeath;
        if ($yearOfBirth <= 0) {
            return -1;
        }
        return $yearOfBirth;
    }
}

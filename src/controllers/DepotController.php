<?php

namespace App\Controllers;
use App\Models\DetteModel;

class DepotController {
    private DepotModel $depotModel;


    public function __construct() {
        $this->depotModel = new DepotModel();
    }
    public function index() {

        
    }
}
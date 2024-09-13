<?php

namespace App\Controllers;
use App\Models\CategorieModel;

class ArticleController {
    private CategorieModel $categorieModel;


    public function __construct() {
        $this->articleModel = new CategorieModel();
    }
    public function index() {

        
    }
}
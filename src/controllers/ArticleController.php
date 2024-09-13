<?php

namespace App\Controllers;
use App\Models\DetteModel;

class ArticleController extends Controller {
    private ArticleModel $articleModel;

    public function __construct(){
        $this ->articleModel=new ArticleModel;
        $this->load();
    }
    public function load() {
        $datas=$this->detteModel->ShowArticle();
        parent::rendorView("article/liste.article",["datas"=>$datas]);

        
    }
}
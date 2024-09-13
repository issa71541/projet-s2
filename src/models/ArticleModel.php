<?php

namespace App\Models;
use App\Core\Model;

class ArticleModel extends Model{

    public function FindArticleByRef(string $ref){ 
        $sql = "SELECT * FROM article WHERE refA = '$ref' ";
        return $this->executeSelect($sql);
    }

    public function ShowArticle(){ 
        $sql = "SELECT * FROM article";
        return $this->executeSelect($sql);
    }




}

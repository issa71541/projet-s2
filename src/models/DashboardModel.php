<?php

namespace App\Models;
use App\Core\Model;

class DashboardModel extends Model{

    public function findNumberClient()
    { 
        $sql = " SELECT COUNT(*) AS Client FROM `client` ";
        return $this->executeSelect($sql);
    }

    public function findDettesDuJour()
{ 
    $sql = "SELECT COUNT(*) AS nombreDettes 
            FROM `dette` 
            WHERE `dated` = CURDATE()";
    return $this->executeSelect($sql);
}



}

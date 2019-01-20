<?php namespace App\Controllers;
use App\Models\M_groupusers_model;
use CodeIgniter\Controller;

class M_groupuser extends Controller{

    // public function __construct() {
    //     parent::__construct();
    // }
    
    public function  index(){
        $groupuser = new M_groupusers_model();
        echo json_encode($groupuser->findAll());
    }
}
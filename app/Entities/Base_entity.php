<?php namespace App\Entities;

use CodeIgniter\Entity;

class Base_entity extends Entity{
    
    // public $table = '';
    
    // private $db;
    // private $forge;
    // public function __construct()
	// {
    //     $db = \Config\Database::connect();
    //     $forge = \Config\Database::forge();

    //     if (!$this->table)
    //         $this->table = explode("\\", str_replace('_model', '', strtolower(get_class($this))))[2];

    //     $this->create_member();
    // }

    // public function create_member()
	// {
	// 	$fields = $this->db->fieldData($this->table);
	// 	foreach ($fields as $field)
	// 	{
	// 		$name = $field->name;
	// 		$this->$name = null;
	// 	}
	// 	return $this;
		
	// }   
}
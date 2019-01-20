<?php namespace App\Models;

use CodeIgniter\Model;

class Base_model extends Model {

    protected $db;

    protected $table = '';
    protected $primaryKey = 'Id';
    protected $returnType = '';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    

    public function __construct()
	{
        parent::__construct();
        $db = \Config\Database::connect();

        if (!$this->table)
            $this->table = explode("\\", str_replace('_model', '', strtolower(get_class($this))))[2];
            
		
		if (!$this->row_type)
		{
			$row_type = ucfirst(entity($this->table)).'_entity';
			if (class_exists($row_type)){
                //$this->returnType = 'App\Entities\/'.$row_type;
                $this->returnType = 'array';
            }
        }
        
    }


}

// For standalone distrubution
if (!defined('MYSQL_EMPTYDATE')) define('MYSQL_EMPTYDATE', '0000-00-00');
if (!defined('MYSQL_EMPTYDATETIME')) define('MYSQL_EMPTYDATETIME', '0000-00-00 00:00:00');
if (!function_exists('mysqldatetime'))
{
	function mysqldatetime($timestamp)
	{
		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('Asia/Jakarta'));
		return $date->format('Y-m-d H:i:s');
		//return date('Y-m-d H:i:s', $timestamp);
	}
}
if (!function_exists('model'))
{
	function model($entity)
	{
		helper('inflector');
		return ucfirst(plural($entity));
		//return plural($entity);
	} 
}
if (!function_exists('table'))
{
	function table($entity)
	{
		helper('inflector');
		return plural($entity);
	}
}
if (!function_exists('entity'))
{
	function entity($table)
	{
		helper('inflector');
		return singular($table);
	}
}

if (!function_exists('column'))
{
	function column($entity)
	{
		$new_str = "";
		$str_arr = explode("_",$entity);
		foreach($str_arr as $str){
			$new_str = $new_str.ucfirst($str)."_";
		}
		return substr($new_str, 0, strlen($new_str) - 1);
	}
}
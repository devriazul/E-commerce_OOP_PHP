<?php
 	include('db_config.php');

 	class Helper{

 		public function CategoryIDToName($id){

			$connection = db_config::DBConnect();
	        $sql = "SELECT * FROM categories where id='$id'";
	        $connection = db_config::DBConnect();
	        $resource_data = $connection->view($sql);
	        $resource_obj = $resource_data->fetch_object();
	        return $resource_obj;
 		}
 		public function ProductIDToImage($id){

			$connection = db_config::DBConnect();
	        $sql = "SELECT * FROM product_images where product_id='$id'";
	        $connection = db_config::DBConnect();
	        $resource_data = $connection->view($sql);
	        
	        return $resource_data;
 		}
 		public function ProductIDToProductAllInfo($id){

			$connection = db_config::DBConnect();
	        $sql = "SELECT * FROM products where id='$id'";
	        $connection = db_config::DBConnect();
	        $resource_data = $connection->view($sql);
	        
	        return $resource_data;
 		}
		public static function HelperConnect(){
			$Helper = new Helper;
			return $Helper;
		}
 	}

?>
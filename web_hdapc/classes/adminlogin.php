<?php
     $filepath=realpath(dirname(__FILE__));
   include ($filepath.'/../lib/session.php');  
   Session::checkLogin();
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
?>

<?php

	class Adminlogin
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db=new Database();
			$this->fm= new Format();
		}
		public function lg_ad($adminUSer,$adminPass)
		{
			$adminUSer=$this->fm->validation($adminUSer);
			$adminPass=$this->fm->validation($adminPass);

			$adminUser=mysqli_real_escape_string($this->db->link,$adminUSer);
			$adminPass=mysqli_real_escape_string($this->db->link,$adminPass);

			if(empty($adminUSer) || empty($adminPass))
			{
				$alert ="Username and Password must not be empty";
				return $alert;
			}
			else
			{
				$query="SELECT * from admin where adUser='$adminUser' and adPass='$adminPass' limit 1";
				$result=$this->db->select($query);

				if($result != false)
				{
					$value=$result->fetch_assoc();
					Session::set('Adminlogin',true);
					Session::set('adminID',$value['adID']);
					Session::set('adminUser',$value['adUser']);
					Session::set('adminName',$value['adName']);
					header('Location:../admin2/index.php');
					// $alert =Session::get('adminName');
					// return $alert;
				}
				else{
					$alert ="Username and Password not match";
					return $alert;
				}

					

			}
		}
	}
?>
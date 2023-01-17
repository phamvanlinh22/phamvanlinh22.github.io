<?php
    $filepath=realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
?>
<?php

	class review
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db=new Database();
			$this->fm= new Format();
		}

		public function getReview($pdid)
		{
			$query="SELECT * from review where pdid=$pdid";
			$result=$this->db->select($query);
			$kq="";
			$sentiment='';
			if(isset($result) && mysqli_num_rows($result)>0){
				while($row=$result->fetch_assoc()){
					$stars='';
					for($i=1; $i<=5;$i++){
						if($i<=$row['vote'])
							$stars.='<i class="fas fa-star star-voted"></i>';
						else
							$stars.='<i class="fas fa-star"></i>';
					}
					if(trim($row['sentiment'])=='positive'){
						$sentiment='<img src="icon/happy.png" class="sentiment" width="30">';
					}
					else{
						$sentiment='<img src="icon/sad2.png" class="sentiment" width="30">';
					}

					$kq.='<div class="review-temp">
				            <div class="hghghg">
				              <img src="icon/anonymous.png" width="50">
				              <div class="klklkl">'.$row['reviewer'].'</div>
				              <div>'.$row['datesend'].'</div>
				            </div>

				            <div class="ababab">
				              <div >
				                '.$stars.'
				              </div>
				            '.$sentiment.'
				              <div class="ppppp">
									'.$row['message'].'				               
				              </div>
				            </div>
				        </div>';
				}
			}
			return $kq;
				

		}

		public function insert_review($pdid,$name,$txt,$vote){
			$date=date('d-m-Y');

			$sentiment= shell_exec('python sentiment.py '.$txt);
			$query="INSERT INTO review(pdid,reviewer,message,datesend,vote,sentiment) VALUES ($pdid,'$name','$txt','$date',$vote,'$sentiment')";

			$result=$this->db->insert($query);

			if($result!=null)
				return 1;
			return 0;
		}

		
		

	}
?>
<?php 
$curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 0,
                CURLOPT_URL => 'https://ems.vlute.edu.vn/api/danhmuc/getsinhvienbykeyword/1700',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            ));

            $resp = curl_exec($curl);
            curl_close($curl);
            echo $resp;

 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $.ajax({
              url:"https://ems.vlute.edu.vn/api/danhmuc/getsinhvienbykeyword/170043262620",
              method:'get',
              data:{},
              dataType:"JSON",
              success: function(data){
                  document.write(data.length);
                }
  })
</script>
<?php 
$data=[];
if(isset($_POST['getSDorder'])){
$orderrr = <<<HTTP_BODY
        {
            "page_size": 10,
            "order_date_from": "2021-05-01",
            "order_date_to": "2021-07-07",
            "order_status_date_from": null,
            "order_status_date_to": null,
            "token": null
        }
        HTTP_BODY;
$curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 0,
                CURLOPT_URL => 'https://open.sendo.vn/api/partner/salesorder/search',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $orderrr,
                CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "authorization: bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJTdG9yZUlkIjoiOTAyMjI2IiwiVXNlck5hbWUiOiIiLCJTdG9yZVN0YXR1cyI6IjIiLCJTaG9wVHlwZSI6IjEiLCJTdG9yZUxldmVsIjoiIiwiZXhwIjoxNjIxOTI4NjA0LCJpc3MiOiI5MDIyMjYiLCJhdWQiOiI5MDIyMjYifQ.P1lUP2Zvbhv6cO8SSWwDsq21mvqGZwp-lmGpEQOndNQ"
            ),
            ));

            $resp = curl_exec($curl);
            curl_close($curl);
            $res=json_decode($resp,true);
            $saleorder=$res['result']['data'];
            $len= sizeof($saleorder);
            $kq='';
            $status_od='';
            for($i=0 ; $i<$len ;$i++ ){
            $action_bt='';
            $color_tb='';
           		
  
            if($saleorder[$i]['sales_order']['order_status']==2)
            {
            	$status_od='Chờ xác nhận';
            	$action_bt='<div style="padding:20px 10px 20px 750px;">
	              <button class="bt-huysd" onclick="confirmSDOD('.$saleorder[$i]['sales_order']['order_number'].',3)">Hủy</button>
	              <button class="bt-xnsd" onclick="confirmSDOD('.$saleorder[$i]['sales_order']['order_number'].',13)"><i class="far fa-calendar-check"></i> Xác nhận</button>
	            </div>';
	            $color_tb='#0A4EBE';
            }
            else if($saleorder[$i]['sales_order']['order_status']==6)
            {
            	$status_od='Đang vận chuyển';
            	$color_tb='green';
            }
           	else{
           		$status_od='Đã hủy';
           		$color_tb='#BD1515';
           	}
           	$item_od='';
           	if(sizeof($saleorder[$i]['sku_details'])>0){
           		for ($k=0; $k < sizeof($saleorder[$i]['sku_details']); $k++) { 
           			$sku=$saleorder[$i]['sku_details'][$k]['sku'];
           			$curl = curl_init();
		            curl_setopt_array($curl, array(
		                CURLOPT_RETURNTRANSFER => 0,
		                CURLOPT_URL => 'https://open.sendo.vn/api/partner/product?sku='.$sku,
		                CURLOPT_RETURNTRANSFER => true,
		                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		                CURLOPT_CUSTOMREQUEST => "GET",
		                CURLOPT_HTTPHEADER => array(
		                "Content-Type: application/json",
		                "authorization: bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJTdG9yZUlkIjoiOTAyMjI2IiwiVXNlck5hbWUiOiIiLCJTdG9yZVN0YXR1cyI6IjIiLCJTaG9wVHlwZSI6IjEiLCJTdG9yZUxldmVsIjoiIiwiZXhwIjoxNjIxOTI4NjA0LCJpc3MiOiI5MDIyMjYiLCJhdWQiOiI5MDIyMjYifQ.P1lUP2Zvbhv6cO8SSWwDsq21mvqGZwp-lmGpEQOndNQ"
		            ),
		            ));
		            $resp = curl_exec($curl);
		            $res=json_decode($resp,true);
		            $image_sku=$res['result']['image'];

           			$item_od.='<tr>
                    <td style="text-align: center;width: 150px; padding:5px;">
                      <img src="'.$image_sku.'" width="50" >
                    </td>
                    <td style="text-align: center;width: 150px;">
                      '.$sku.'
                    </td>
                    <td style="text-align: center;width: 150px;">
                      '.$saleorder[$i]['sku_details'][$k]['product_name'].'
                    </td>
                    <td style="text-align: center;width: 150px;">
                      '.$saleorder[$i]['sku_details'][$k]['quantity'].'
                    </td>
                    <td style="text-align: center;width: 150px; color: blue;">
                      '.number_format($saleorder[$i]['sku_details'][$k]['price']).'đ
                    </td>
                  </tr>';
           		}
           	}
           	

            	$kq.='<div class="order-item">
            <div class="stt-order">1</div>
            <div class="sdorder-info">
              <div class="madhsd">
                <div><span>Mã đơn hàng</span></div>
                <div><a href="https://profile.sendo.vn/chi-tiet-don-hang/'.$saleorder[$i]['sales_order']['order_number'].'">#'.$saleorder[$i]['sales_order']['order_number'].'</a></div>
              </div>
              <div class="madhsd2">
                <div><span>Khách hàng:</span> '.$saleorder[$i]['sales_order']['receiver_name'].'</div>
                <div><span>Số điện thoại:</span> '.$saleorder[$i]['sales_order']['shipping_contact_phone'].'</div>
                <div><span>Email:</span> '.$saleorder[$i]['sales_order']['receiver_email'].'</div>
                <div></div>
              </div>
              <div class="madhsd2">
                <div><span>Ngày đặt:</span> '.date('h:i - d/m/Y',$saleorder[$i]['sales_order']['order_date_time_stamp']).'</div>
                <div><span>Giao hàng:</span><span></span> Chuyển phát tiêu chuẩn</div>
                <div><span>Thanh toán:</span> Ship COD</div>
              </div>
              <div><span>Tình trạng:</span> <span style="color: '.$color_tb.';">'.$status_od.'</span></div>
            </div>

            <div>
                <table border="1" style="width: 98%;margin-top: 10px;margin-left: 10px;border-color: #C9C9C9;">
                  <tr>
                    <td class="sdod-title">Hình ảnh</td>
                    <td class="sdod-title">Mã sản phẩm</td>
                    <td class="sdod-title">Tên sản phẩm</td>
                    <td class="sdod-title">Số lượng</td>
                    <td class="sdod-title">Giá</td>
                  </tr>
                  '.$item_od.'
                </table>
            </div>

            <div style="padding-left: 73%; margin-top:10px;">
              <table>
                <tr>
                  <td style="font-weight:600;text-align: right;  padding-right:70px; ">Tổng tiền:</td>
                  <td style="text-align: right;">'.number_format($saleorder[$i]['sales_order']['total_amount']).'đ</td>
                </tr>
                <tr>
                  <td style="font-weight:600;text-align: right;  padding-right:70px; ">Phí vận chuyển:</td>
                 <td style="text-align: right;">
                 '.number_format($saleorder[$i]['sales_order']['total_amount_buyer']-$saleorder[$i]['sales_order']['total_amount']).'đ
                 </td>
                </tr>
                <tr>
                  <td style="font-weight:600;text-align: right;  padding-right:70px; ">Tổng thanh toán:</td>
                  <td style="text-align: right;color: red;"><span>'.number_format($saleorder[$i]['sales_order']['total_amount_buyer']).'đ</span></td>
                </tr>
              </table>
            </div>
            '.$action_bt.'
            
          </div>';
            }
            $data['result']= $kq;

            echo json_encode($data,true);
            // echo $resp;
}

if(isset($_POST['OdsdID'])){
	$data=[];
	$odid=$_POST['OdsdID'];
	$choice=$_POST['choice'];

	$orderrr = <<<HTTP_BODY
        {
            "order_number": "$odid",
            "order_status": $choice,
            "cancel_order_reason": "CBS101"
        }
        HTTP_BODY;
	$curl = curl_init();
	            curl_setopt_array($curl, array(
	                CURLOPT_RETURNTRANSFER => 0,
	                CURLOPT_URL => 'https://open.sendo.vn/api/partner/salesorder',
	                CURLOPT_RETURNTRANSFER => true,
	                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	                CURLOPT_CUSTOMREQUEST => "PUT",
	                CURLOPT_POSTFIELDS => $orderrr,
	                CURLOPT_HTTPHEADER => array(
	                "Content-Type: application/json",
	                "authorization: bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJTdG9yZUlkIjoiOTAyMjI2IiwiVXNlck5hbWUiOiIiLCJTdG9yZVN0YXR1cyI6IjIiLCJTaG9wVHlwZSI6IjEiLCJTdG9yZUxldmVsIjoiIiwiZXhwIjoxNjIxOTI4NjA0LCJpc3MiOiI5MDIyMjYiLCJhdWQiOiI5MDIyMjYifQ.P1lUP2Zvbhv6cO8SSWwDsq21mvqGZwp-lmGpEQOndNQ",
	                
	            ),
	            ));

            $resp = curl_exec($curl);
    //         curl_close($curl);
    //         $res=json_decode($resp,true);
		    $data['result']=$resp['success'];
		    echo json_encode($data,true);
}
?>
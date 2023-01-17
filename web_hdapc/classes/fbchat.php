<?php
    $filepath=realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
   include_once ($filepath.'/../facebook/autoload.php');
?>

<?php

  class chat
  {
    private $db;
    private $fm;
    private $fb;
    private $access_token;

    public function __construct()
    {
      $this->db=new Database();
      $this->fm= new Format();
      $this->access_token="EAAGndj4v5hIBAFB7nl0LaTiZCC6IjQjfaZBz7nOqkMEq8HqRElKkIZBgMGGkHFldrLxIb340bg3Y3mw5MmwAfJxpfvTZCj0OzQzvsvWMWihFSoVdNn8IZCg8cNJetaUy9IkKqpYrdW6EwUZBllS3TL02sgYlXdJFm9ZBb9SlpMD8A02rQv6f4epcoDMRuToyWhjp2rR1HWXdAZDZD";
      $this->fb = new \Facebook\Facebook([
      'app_id' => '465601268016658',           
      'app_secret' => '0dc0210b4478e2b20b92f0342e9f4a19', 
      'graph_api_version' => 'v5.0',
    ]);
      
      
    }
    
     



    function getListChat(){    

      $result='';
      try {
      $response = $this->fb->get(
        '107215267638278/conversations?fields=senders,snippet,unread_count',
        $this->access_token
      );
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }
      $graphNode = $response->getGraphEdge();

      foreach ($graphNode as $key => $value) {

        try {
        $response = $this->fb->get(
          '/'.$value['senders'][0]['id'].'?fields=first_name,last_name,profile_pic',
          $this->access_token
        );
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        $img = $response->getGraphNode();


        $result.='<div class="chat-content" onclick="loadMessage(this)"" conv_id="'.$value['id'].'" psid="'.$value['senders'][0]['id'].'">
                <img src='.$img['profile_pic'].'>
                <div class="chat-info">
                  <div class="chat-name">'.$value['senders'][0]['name'].'</div>
                  <div class="last-mess">
                    <span>'.$value['snippet'].' . 1 giờ<span>
                  </div>
                </div>
              </div>';
      }

      return $result;
      }


      function userInfo($id){

        try {
        $response = $this->fb->get(
          '/'.$id.'?fields=first_name,last_name,profile_pic',
          $this->access_token
        );
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        $graphNode = $response->getGraphNode();
        return $graphNode['profile_pic'];
      }
    

    function loadMessage($conv_id,$src){
      $conv="";
        try {
    // Returns a `Facebook\FacebookResponse` object
        $response =$this->fb->get(
          '/'.$conv_id.'?fields=messages{message,from,id,created_time,to}',
          $this->access_token
        );
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }
      $graphNode = $response->getGraphNode();
      $messages=$graphNode['messages'];


      $date='';
      
      // $date=$messages[sizeof($messages)-1]['created_time']->format('d/m/y');
      // $newtime = strtotime ( '+7 hour' , strtotime ( $messages[$i]['created_time']->format('h:i') ) ) ;
      // $newtime = date ( 'h:i' , $newtime );
      
      for($i=sizeof($messages)-1; $i >=0 ; $i--){
        $create_date=$messages[$i]['created_time']->format('d/m/y');

        $newtime = strtotime ( '+7 hour' , strtotime ( $messages[$i]['created_time']->format('h:i') ) ) ;
        $newtime = date ( 'h:i' , $newtime );

        if($date != $create_date){
          $date=$create_date;
          
          $ngay=$messages[$i]['created_time']->format('d');
          $thang=$messages[$i]['created_time']->format('m');
          $nam=$messages[$i]['created_time']->format('y');
          $weekday = strtolower($messages[$i]['created_time']->format('l'));
          switch($weekday) {
            case 'monday':
                $weekday = 'Th2';
                break;
            case 'tuesday':
                $weekday = 'Th3';
                break;
            case 'wednesday':
                $weekday = 'Th4';
                break;
            case 'thursday':
                $weekday = 'Th5';
                break;
            case 'friday':
                $weekday = 'Th6';
                break;
            case 'saturday':
                $weekday = 'Th7';
                break;
            default:
                $weekday = 'CN';
                break;
        }

          $date2=$newtime." ,".$weekday." - ".$ngay." Tháng ".$thang." ,".$nam."<br>";
          if($i==sizeof($messages)-1){
            $conv.='<div class="created_time">'.$date2.'</div>';
          }
          else{
              $conv.="</div> </div> </div>";
              $conv.='<div class="created_time">'.$date2.'</div>';
              $sender=$messages[$i]['from']['id'];
              if($sender != '107215267638278'){
                    $conv.='<div class="guest">
                                <div class="chat-start">
                                    <img src="'.$src.'" width="30">
                                    <div class="mesage-box">';

                    }
                    
              else{
                      $conv.='<div class="you">
                                <div class="chat-start">;
                                    <div class="mesage-box">';

                    }

          }

          
        }
        // elseif($i==sizeof($messages)-1){
        //   $conv.='<div class="created_time">'.$date2.'</div>';
        // }


        if($i==sizeof($messages)-1){
          $sender=$messages[sizeof($messages)-1]['from']['id'];
          if($sender != '107215267638278'){
                $conv.='<div class="guest">
                            <div class="chat-start">
                                <img src="'.$src.'" width="30">
                                <div class="mesage-box">';

                }
                
          else{
                  $conv.='<div class="you">
                            <div class="chat-start">;
                                <div class="mesage-box">';

                }
        }
        // else{
        //   $conv.="</div> </div> </div>";
        //   $conv.='<div class="created_time">'.$date2.'</div>';
        // }

        if($sender==$messages[$i]['from']['id']){
            
            if($messages[$i]['from']['id'] != '107215267638278'){
                $conv.='<div class="message" tooltip="'.$newtime.'" flow="right">
                                '.$messages[$i]['message'].'
                                </div><br>';
            }
            else
              $conv.='<div class="message" tooltip="'.$newtime.'" flow="left">
                                '.$messages[$i]['message'].'
                                </div><br>';
          }
          else{
            $sender=$messages[$i]['from']['id'];
            $conv.="</div> </div> </div>";

            if($messages[$i]['from']['id'] != '107215267638278'){
               $conv.='<div class="guest">
                        <div class="chat-start">
                            <img src="'.$src.'" width="30">
                            <div class="mesage-box">
                                <div class="message" tooltip="'.$newtime.'" flow="right">
                                '.$messages[$i]['message'].'
                                </div><br>';
            }
            
            else{
              $conv.='<div class="you">
                        <div class="chat-start">
                            <div class="mesage-box">
                                <div class="message" tooltip="'.$newtime.'" flow="left">
                                  '.$messages[$i]['message'].'
                                </div><br>';
            }

          }
            
        
      }
      $conv.="</div> </div> </div>";

      return $conv;

      // return 'hello';
    }

  function send_message($id,$message){
    $reply='{
      "messaging_type": "RESPONSE",
      "recipient": {
        "id": "'.$id.'"
      },
      "message": {
        "text": "'.$message.'"
      }
    }';
    $url="https://graph.facebook.com/v10.0/me/messages?access_token=".$this->access_token;
    $ch=curl_init();
    $headers=array("Content-type: application/json");
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$reply);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $st=curl_exec($ch);
    return 'ok';
  }


    

}
?>
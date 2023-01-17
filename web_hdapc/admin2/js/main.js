

function loadListChat(){
	$.ajax({
        url: 'chatprocess.php',
        type: 'post',
        data: { list:'yes'},
        dataType:"JSON",
     //    beforeSend: function() {
     //    $('.chat-body').html('<div class="loader">Loading...</div>');
    	// },
        success: function(data){
            if(data.result!=""){
                  // alert(data.result);
                  $('.chat-body').html(data.result);
            }
            else 
               	alert('Lỗi');
                  
            },
    });
}
// $( document ).ready(function() {
//     loadListChat();
// });






function sendMessage(messages,id){
  const reply_message=`{
    "messaging_type": "RESPONSE",
    "recipient": {
      "id": "4442064995821905"
    },
    "message": {
      "text": `+messages+`
    }
  }`;

    $.ajax({
        url: 'chatprocess.php',
        type: 'post',
        data: { list:'yes'},
        dataType:"JSON",
        success: function(data){
            if(data.result!=""){
                  // alert(data.result);
                  $('.chat-body').html(data.result);
            }
            else 
                alert('Lỗi');
                  
            },
    });



}

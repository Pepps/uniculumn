$(document).ready(function() {


  $(".controlPanel_dropDown").toggle(
        function(){$(".control_panel").show();},
        function(){$(".control_panel").hide();
     });

$(".edit_icon").mouseenter(function(){
       $(this).css("background-image","url(img/edit_orange.PNG)");
      });

    $(".edit_icon").mouseleave(function(){
       $(this).css("background-image","url(img/edit.PNG)");
      });

      $("#upload_button").click(function(){
      $("#user_content").hide();
        $("#user_upload").slideDown(1000);
      });

      $(".login_button, .register_button").mouseenter(function(){
       $(this).css("background-color","#ffc106");
      });



      $(".login_button, .register_button").mouseleave(function(){
       $(this).css("background-color","#243333");
      });

		$(".back_to_welcome").mouseenter(function(){
       $(this).css("background-image","url(img/arrow_orange.PNG)");
      });

		$(".back_to_welcome").mouseleave(function(){
       $(this).css("background-image","url(img/arrow_blue.PNG)");
      });

      $(".trigger_registration").mouseenter(function(){
       $(this).css("color","#ffc106");
      });

      $(".trigger_registration").mouseleave(function(){
       $(this).css("color","#56c5cc");
      });


      $(".trigger_registration").click(function(){
      $(".welcome_box").hide();
        $(".registration_box").slideDown(600);
      }); 

      $(".back_to_welcome").click(function(){
      $(".registration_box").hide();
        $(".welcome_box").show('slide',{direction:'right'},700);
      }); 


  });
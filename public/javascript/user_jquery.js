$(document).ready(function() {

  controlPanel = true;

$("#clickyes").click(function(){
        $("#hide_me2").children('.dark_square').removeClass('s_users  s_projects s_experiences s_status s_categories').animate({ "padding-top": "0vw", "height" : "2vw", "background-image" : "none", "color" : "white" }, "slow" );
        $("#hide_me, #search_for").slideDown('slow');
        $("#search_in").hide().html("<div class='search_div'>Söker i...</div>").fadeIn('slow');
      });

  $("#clickmetoo").click(function(){
    
      if (controlPanel == true) {
            $(".control_panel2").show();
            $("#clickmetoo").css({ "background-color" : "#56c5cb"}, "fast" );
            $("#clickmetoo").animate({ "border": "0vw", "height" : "3.6vw", "background-color" : "#2f4343", "width" : "11vw", "padding" : "0.5vw" }, 450 );
            controlPanel = false;
        }
        });

  

  $(".controlPanel_dropDown").toggle(
        function(){$(".control_panel").show();},
        function(){$(".control_panel").hide();
     });


    $("#hide_controlpanel").click(function(e){
            controlPanel = true;
            $(".control_panel2").hide();
            $("#clickmetoo").css({ "border-top": "0.7vw solid #56c5cb", "border-left": "0.5vw solid transparent", "border-right": "0.5vw solid transparent", "height" : "0vw", "background-color" : "transparent", "width" : "0vw", "padding" : "0" }, "slow" );
            e.stopPropagation();
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
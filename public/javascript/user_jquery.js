$(document).ready(function() {


// variabler!!!!!!!!!!
  controlPanel = true;
  expType = true;

$(".edit_references").on('click', function(){
     $(this).closest('.ex_column').find('.references_choices').slideDown();
    $(' #first_name, #last_name, #phone_number, #email_address').attr("disabled", false);
     $(this).closest('.ex_column').find('.show_references').css("display", "none");
     $(this).closest('.ex_column').find('.allreferences').hide();
      });

$(".delete_reference, .delete_member").on('click', function(){
     $(this).parent().remove();
      });

$(".edit_tags").on('click', function(){

   if ( $(this).closest('.ex_column').find('.edit_tags_block').css("display") == "block") {
     $(this).closest('.ex_column').find('.edit_tags_block').slideUp('slow');
      }
      else {
     $(this).closest('.ex_column').find('.edit_tags_block').slideDown('slow');
     }
      });


$(".clearreference, .addreference").click(function(){
     $(this).closest('.ex_column').find('.show_references').css("display", "inline-block");
      $(this).closest('.ex_column').find(".references_choices").slideUp('slow');
        });

    $(".clearreference").click(function(){
    $('#first_name, #last_name, #phone_number, #email_address').val('');
    $('#first_name, #last_name, #phone_number, #email_address').attr("disabled", true);
        });



$(".edit_experience").on('click', function(){
     $(this).closest('.ex_column').find('.edit_wrapper').css({ "width": "16vw"});
     $(this).closest('.ex_column').animate({ "height" : "10vw", "background-color" : "white", "margin-bottom": "2vw"}, 350 );
     $(this).closest('.ex_column').find('.ex').animate({ "height" : "6vw"}, 450 );
     $(this).closest('.ex_column').find('.show_references').css("display", "none");
     $(this).closest('.ex_column').find('.edit_this').show();
     $(this).closest('.ex_column').find('.ex_button, .allreferences, .references_choices, .hide_this').hide();
});


$(".add_ref_edit, .ignore_ref_edit").on('click', function(){
     $(this).closest('.ex_column').find('.edit_wrapper').css({ "width": "10vw"});
     $(this).closest('.ex_column').animate({"background-color" : "transparent", "margin-bottom": "0.5vw"}, 350 ).css({ "height": ""});
     $(this).closest('.ex_column').find('.ex').animate({ "height" : "3vw"}, 450 );
     $(this).closest('.ex_column').find('.show_references').css("display", "inline-block");
     $(this).closest('.ex_column').find('.edit_this, .edit_tags_block').hide();
     $(this).closest('.ex_column').find('.ex_button, .hide_this').show();
     $('input:checkbox').removeAttr('checked');
      });




    $(".show_references").on('click', function(){
      if ( $(this).find('.allreferences').css("display") == "block") {
        $(this).find('.allreferences').slideUp('slow');
      }
      else {
       var THIS = $(this);
       $(THIS).find('.allreferences').slideDown('slow');
       /*$(THIS).find(".project_members_square").remove();
       console.log($(this).find('.projectid').text());
       $.ajax({
           type: 'GET',
           dataType: 'json',
           url: '/project/getusers/'+$(THIS).find('.projectid').text(),
           success : function(data) {
             console.log(data.length);
             for(var i = 0; i< data.length; i++){
               console.log(data[i].firstname);
               //console.log($(THIS).find(".allreferences"));
               $(THIS).find(".allreferences").append(
                 "<div class='project_members_square'>"+
                   "<div class='delete_member'><img src='http://localhost:8000/img/icons/edit/delete.PNG'></div>"+
                   "<span class='label label-info'>"+data[i].email+"</span>"+
                   "<img src='http://localhost:8000/img/avatar.PNG'>"+
                 "</div>"
              );
             }
           }
       });*/
      }
    });

    $(".allreferences, .show_tags, .alltags").on('click', function(e){
       e.stopPropagation();
    });

     $(".show_tags").on('click', function(){

      if ( $(this).closest('.ex_column').find('.alltags').css("display") == "none") {
     $(this).closest('.ex_column').find('.alltags').slideDown('slow');
      }
      else {
     $(this).closest('.ex_column').find('.alltags').slideUp('slow');
     }


    });
// rensa inputs om man byter från anställning till utbildning etc
$('input:radio[name="exptype"]').on('click', function(){
    $('#employer, #employment').val('');
    $('#first_name, #last_name, #phone_number, #email_address').val('');
  if (expType == true) {
 $("#exp_types").children('.exp_square').removeClass('exp_education exp_merits exp_employment exp_other').animate({ "padding-top": "0vw", "height" : "2vw", "background-image" : "none", "color" : "white" }, "slow" );
 $(".things").slideDown('slow');
  expType = false; }
});

  $("#add_references").click(function(){
      $(".references_choices").slideDown('slow');
      $("#add_references").slideUp('slow');
    $(' #first_name, #last_name, #phone_number, #email_address').attr("disabled", false);
        });

// litte radiobuttonz hehe

$('input:radio[value="education"]').on('click', function(){
 $(".employerTitle").text("Skola");
 $(".employmentDescription").text("Utbildning");
 $("#exp_description").removeClass('other_icon education_icon employment_icon').addClass('education_icon');
 $("#exp_employer").removeClass('other_icon merits_icon school_icon employer_icon').addClass('school_icon');
});

$('input:radio[value="employment"]').on('click', function(){
 $(".employerTitle").text("Arbetsgivare");
 $(".employmentDescription").text("Arbetsbeskrivning");
 $("#exp_description").removeClass('other_icon education_icon employment_icon').addClass('employment_icon');
 $("#exp_employer").removeClass('other_icon merits_icon school_icon employer_icon').addClass('employer_icon');
});


$('input:radio[value="merits"]').on('click', function(){
 $(".employerTitle").text("Merit");
 $(".employmentDescription").text("Beskrivning");
 $("#exp_description").removeClass('other_icon education_icon employment_icon').addClass('other_icon');
 $("#exp_employer").removeClass('other_icon merits_icon school_icon employer_icon').addClass('merits_icon');
});


$('input:radio[value="other"]').on('click', function(){
 $(".employerTitle").text("Övrigt");
 $(".employmentDescription").text("Beskrivning");
 $("#exp_description").removeClass('other_icon education_icon employment_icon').addClass('other_icon');
 $("#exp_employer").removeClass('merits_icon school_icon employer_icon').addClass('other_icon');
});


// ehhh funkar detta när det är så många olika kategorier??? tror inte det. :c HMMM dte ska gå att lösa iaf?! men har inte the skillz. <///3
$('input[name="dumbledore"]').on('click', function(){
  if ( $('input[name="dumbledore"]').is(':checked') ) {
      $(".check_subcategories").css({ "background-image" : "url(img/checkmark.PNG)"}, "fast" );
}
else {
      $(".check_subcategories").css({ "background-image" : "url(img/delete_button.PNG)"}, "fast" );
}

});


$("#project_title").on("input", function() {
  $(".check_title").show();
  if( $(this).val().length === 0 ) {
      $(".check_title").css({ "background-image" : "url(img/delete_button.PNG)"}, "fast" );
    }
    else {
      $(".check_title").css({ "background-image" : "url(img/checkmark.PNG)"}, "fast" );
    }
});

$("#project_description").on("input", function() {
  $(".check_description").show();
  if( $(this).val().length === 0 ) {
      $(".check_description").css({ "background-image" : "url(img/delete_button.PNG)"}, "fast" );
    }
    else {
      $(".check_description").css({ "background-image" : "url(img/checkmark.PNG)"}, "fast" );
    }
});

$("#project_category").change(function(){
  $(".check_category").show();
    if ( $(this).val() == "none" ) {
      $(".check_category").css({ "background-image" : "url(img/delete_button.PNG)"}, "fast" );
      $(".subcategories").slideUp();
        }
        else {
      $(".check_category").css({ "background-image" : "url(img/checkmark.PNG)"}, "fast" );
      $(".subcategories").slideDown();
        }

    });
$('input:radio[name="fgg1"]').on('click', function(){
        $("#hide_me2").children('.dark_square').removeClass('s_users  s_projects s_experiences s_status s_categories').animate({ "padding-top": "0vw", "height" : "2vw", "background-image" : "none", "color" : "white" }, "slow" );
        $("#hide_me, #search_for").slideDown('slow');
        $("#search_in").hide().html("<div class='search_div'>Söker i...</div>").fadeIn('slow');
      });

  $("#clickmetoo").click(function(){

      if (controlPanel == true) {
            $(".account_settings").show();
            $("#clickmetoo").css({ "background-color" : "#56c5cb", "cursor" : "text"}, "fast" );
            $("#clickmetoo").animate({ "border": "0vw", "height" : "3.6vw", "background-color" : "#2f4343", "width" : "11vw", "padding" : "0.5vw"}, 450 );
            controlPanel = false;
        }
        });



    $("#hide_controlpanel").click(function(e){
            controlPanel = true;
            $(".account_settings").hide();
            $("#clickmetoo").css({ "border-top": "0.7vw solid #56c5cb", "border-left": "0.5vw solid transparent", "border-right": "0.5vw solid transparent", "height" : "0vw", "background-color" : "transparent", "width" : "0vw", "padding" : "0", "cursor" : "pointer" }, "slow" );
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

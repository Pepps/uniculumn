/* some global varibles witch is needed for generating urls */
var users = [],
    projects = [],
    experinces = [],
    categorys = [],
    status = "";
var option;
var url;

/* function that runs when the window is loaded
   sets up event handlesr for options and key classes in the html

   .option function: just take the value of the selected radio button and adds it to
   the url and shows the keyform.

   .key function: selects all checkboxes in the dom with a class of key and creates a keyboxes
   array. Then loops the keysboxes array of checkboxes and check if its checked and if so
   adds its value to a key arrey. and lastly creates a input area with the createInputArea function
   and passes it the the selected keyboxs value. Lastly it ads the values of keys array to
   the url string and replaces the , with _. */
$(function(){
  url = $("#url");
  var keys = [];
  //foo.com/search/email_category/foo@foo.com-admin@foo.com_spel+kod-game+code
  $(".option").change(function(){
    //console.log($(this).val());
    option = $(this).val();
    url.html("http://www.unicolum.se/search/"+$(this).val()+"/");
    $("#keysform").show();
  });

  $(".key").change(function(){

    var keyboxes = $(".key");
    keys = [];

    $(".valinput").remove();
    //console.log(keyboxes);
    for(var i = 0; i < keyboxes.length; i++){
      if($(keyboxes[i]).is(":checked")){
        keys.push($(keyboxes[i]).val());
        createInputArea($(keyboxes[i]).val());
      }
    }
    //var lastslash = url.html().lastIndexOf("/");
    //var urlstring = url.html().slice(0,lastslash+1) + keys.toString();
    url.html("http://www.unicolum.se/search/"+option+"/" + keys.toString());
    //console.log(urlstring);
    url.html(url.html().replace(new RegExp(",", 'g'), "_"));
    window.urlstr = $("#url").text();
  });
});

/* creates a input area dom for the selected key value (just check the DOM) allso ands the DOM
   to the body tag and adds click event to the .add class button */
function createInputArea(keyval){

  /*if(keyval === "status"){
    var dom = "<div>"+
                  "<input class='inputtype' style='display:none;' value='"+keyval+"'>"+
                  "<input class='status' type='radio' name='status' value='less'><lable>Minde än</lable>"+
                  "<input class='status' type='radio' name='status' value='more'><lable>Mer än</lable>"+
                  "<input class='input'>"+
                  "<button class='add'>Lägg till "+keyval+"</button>"+
              "</div>"
  }else if(!keyval === "status"){*/
    var dom = "<div class='"+keyval+" valinput'>"+
                "<h3>"+keyval+"</h3>"+
                "<input class='inputtype' style='display:none;' value='"+keyval+"'>"+
                "<input class='input' placeholder='"+keyval+"'><button class='add'>Lägg till "+keyval+"</button>"+
                "<ul class='vallist'>"+
                "</ul>"+
              "</div>"
  //}

  $("body").append(dom);

  /* gets the value from the selected input and trims off accses whitespaces. Then checkes if the
     string is not empty. If its empty it loggs a error. if no errors the functions checks what value
     the DOM element off .inputtype have and push it to a switch case witch pushes the right value to the
     right array and runs the create string function. */
  $(".add").on("click", function(){
      var inputval = $.trim($(this).parent().find(".input").val());
      if(!inputval == ""){
        $(this).parent().find("ul").append("<li>"+$(this).parent().find(".input").val()+"</li>");
        switch($(this).parent().find(".inputtype").val()) {
            case "user":
                console.log("users");
                users.push(encodeURI($(this).parent().find(".input").val()));
                break;
            case "project":
                console.log("projects");
                projects.push(encodeURI($(this).parent().find(".input").val()));
                break;
            case "experince":
                console.log("experinces");
                experinces.push(encodeURI($(this).parent().find(".input").val()));
                break;
            case "category":
                console.log("categorys");
                categorys.push(encodeURI($(this).parent().find(".input").val()));
                break;
            case "status":
                status = encodeURI($(this).parent().find(".input").val());
                break;
            default:
                console.error("A error has happend!");
        }
        //var str = users + "_" + projects + "_" + experinces + "_"+ categorys + "_" + status;
        //console.log(str.replace(new RegExp(",", 'g'), "-"));
        createString();
        $(this).parent().find(".input").val("");
      }
  });
}

function createString(){
  /*var users = [],
      projects = [],
      experinces = [],
      categorys = [],
      status = "";*/

  var arr = [];
  var urlstring = "/";

  arr.push(users);
  arr.push(projects);
  arr.push(experinces);
  arr.push(categorys);
  arr.push(status);
  for(var i = 0; i < arr.length; i++){
    if(arr[i].length > 0){
      urlstring += arr[i].toString() + "_";
      console.log(urlstring);
      //var lastslash = url.html().lastIndexOf("/");
      //var urlstring = url.html().slice(0,lastslash+1) + keys.toString();
      var lastindex = urlstring.lastIndexOf("_");
      //urlstring = urlstring.slice(0,lastindex);
      urlstring = urlstring.replace(new RegExp(",", 'g'), "-");
      /*TODO add this to the url!*/
      console.log(urlstr + urlstring.slice(0,lastindex));
      url.html(urlstr + urlstring.slice(0,lastindex));
    }
  }
}

<html>
  <head>
    <title>Unicuolum url generator</title>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
  </head>
  <body>
    <p id="url">http://www.unicolum.se/search/</p>
    <form>
      <h2>Vad vill du söka i?</h2>
      <input class="option" type="radio" name="option" value="users"><lable>Användare</lable>
      <input class="option" type="radio" name="option" value="projects"><lable>Projekt</lable>
      <input class="option" type="radio" name="option" value="experinces"><lable>Erfarenheter</lable>
      <input class="option" type="radio" name="option" value="categorys"><lable>Kategorier</lable>
      <input class="option" type="radio" name="option" value="status"><lable>Status</lable>
    </form>
    <form id="keysform" style="display:none">
      <h2>Vad söker du efter?</h2>
      <input class="key" type="checkbox" value="users"><lable>Användare</lable>
      <input class="key" type="checkbox" value="projects"><lable>Projekt</lable>
      <input class="key" type="checkbox" value="experinces"><lable>Erfarenheter</lable>
      <input class="key" type="checkbox" value="categorys"><lable>Kategorier</lable>
      <input class="key" type="checkbox" value="status"><lable>Status</lable>
    </form>

    <script>
    var users = [],
        projects = [],
        experinces = [],
        categorys = [],
        status = "";
    var option;
    var url;

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
    $(".add").on("click", function(){
        var inputval = $.trim($(this).parent().find(".input").val());
        if(!inputval == ""){
          $(this).parent().find("ul").append("<li>"+$(this).parent().find(".input").val()+"</li>");
          switch($(this).parent().find(".inputtype").val()) {
              case "users":
                  console.log("users");
                  users.push($(this).parent().find(".input").val());
                  break;
              case "projects":
                  console.log("projects");
                  projects.push($(this).parent().find(".input").val());
                  break;
              case "experinces":
                  console.log("experinces");
                  experinces.push($(this).parent().find(".input").val());
                  break;
              case "categorys":
                  console.log("categorys");
                  categorys.push($(this).parent().find(".input").val());
                  break;
              case "status":
                  status = $(this).parent().find(".input").val();
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
    </script>
  </body>
</html>

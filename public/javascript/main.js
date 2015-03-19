window.onload = function(){
  /*var options = {
    valueNames: ['title', 'year']
  };

  var list = new List('container', options);*/


  /*var doc = new jsPDF();

  $("#pdf").on("click", function(e){
    console.log("test");
    e.preventDefault();

    var source = window.document.getElementsByTagName("body")[0];
    doc.fromHTML(source,15,15,{'width': 180});
    doc.output("dataurlnewwindow");

  });*/

  $(".delete_btn").on("click", function(){
    var THIS = $(this);
    //console.log($(this).parent().parent());
    if(confirm("är du säker på att du vill ta bort?")){
      console.log($(THIS).parent().find(".proj_id").text());
      $.ajax({
          type    : 'GET',
          url     : '/project/delete/'+$(THIS).parent().find(".proj_id").text(),
          success : function() {
            $(THIS).parent().parent().remove();
          }
      });
    }
  });
}

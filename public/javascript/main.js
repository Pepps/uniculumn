window.onload = function(){
  var options = {
    valueNames: ['title', 'year']
  };

  var list = new List('cv-search', options);


  var doc = new jsPDF();

  $("#pdf").on("click", function(e){
    e.preventDefault();

    var source = window.document.getElementsByTagName("body")[0];
    doc.fromHTML(source,15,15,{'width': 180});
    doc.output("dataurlnewwindow");

  });
}

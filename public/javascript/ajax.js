var subcategories = [];
var collaborators = [];
show(0);

$(function(){
    var bool = true;

    $.ajax({
        type    : 'GET',
        url     : '/user/show',
        success : function(result) {
            var users = new Array();
            var usersIds = new Object();

            var data = $.parseJSON(result);
            for(var i=0;i<data.length;i++){
                users[data[i]['firstname']] = data[i]['id'];
                console.log(data[i]['id']);
                console.log(users[i]);
            }
            collaborator(users);

        }
    }, "json");

    $('.button-collaborators').on('click',function(e) {
        e.preventDefault();
        if (jQuery.inArray($('#input-collaborators').val(), collaborators) == -1) {
            collaborators.push($('#input-collaborators').val());
            rednerCollaborators();
            $('#input-collaborators').val("");
        }
    });
});
$(document).on('click','.remove', function() {
    collaborators.splice($(this).data("id"),1);
    rednerCollaborators();
});

function rednerCollaborators() {
    $('#bloodhound-names').html("");
    for(var i=0;i<collaborators.length;i++) {
        $('#bloodhound-names').append('<span class="col-lab label label-info">'+collaborators[i]+' <i data-id="'+i+'" class="remove fa fa-times"></i></span>');
    }
    $('#collaborators_id').val("");
    $('#collaborators_id').val(collaborators.toString().replace(new RegExp(",","g"), "-"));
}


function collaborator(names) {

var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substrRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        // the typeahead jQuery plugin expects suggestions to a
        // JavaScript object, refer to typeahead docs for more info
        matches.push({ value: str });
      }
    });
    cb(matches);
  };
};

$('#bloodhound .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'users',
  displayKey: 'value',
  source: users
});
}

function show(id) {
    $.ajax({
        type    : "GET",
        url     : "/category/show/"+id,
        success : function(data) {
            data = jQuery.parseJSON(data);
            if (id==0) {
                $('#category').html("");
                for (var i=0; i<data.length; i++) {
                    $('<option value="'+data[i]['id']+'">'+data[i]['title']+'</option>').appendTo($('#category'));
                    }
                }
                else {
                    $('#subcategory-form').html("");
                    var x = 0;
                    for (var i=0; i<data.length; i++) {
                            $('<div class="checkbox"><input type="checkbox" class="sub-checkbox" name="subcategory" value="'+data[i]['id']+'"/>'+data[i]['title']+"</div>").appendTo($(' #subcategory-form') );
                        }
                    }

            $(".sub-checkbox").on("change", function(){
                if (jQuery.inArray($(this).val(), subcategories) == -1) {
                    subcategories.push($(this).val());
                }
                else {
                    subcategories.splice(jQuery.inArray($(this).val(), subcategories),1);
                }
                $('#subcategory_id').val("");
                $('#subcategory_id').val(subcategories.toString().replace(new RegExp(",","g"), "-"));
            });
        }
    }, "json");

    return false;
}

$(document).on('change', '#category', function(e) {
    e.preventDefault(e);

        //-----
        // TODO comments here
        //-----

    show($("#category").val());


});



// ################  Dropzone  ##############
$(document).ready(function() {
    $("#dropzone").dropzone({ url: "/file/post" });
});

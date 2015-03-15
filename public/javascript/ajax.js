var subcategories = [];
var collaborators = [];
var names = [];
var element = {};
var userId = [];
var inputId = [];
categoryShow(0);
//stateShow(0);

$(function(){
    var bool = true;

    $.ajax({
        type    : 'GET',
        url     : '/user/show',
        success : function(result) {
            var data = $.parseJSON(result);
            for(var i=0;i<data.length;i++){
                names.push(data[i]['email']);
                element.email = data[i]['email'];
                element.id = data[i]['id'];
                userId.push({'element' : element});
                element = {};
            }
            collaborator(names);

        }
    }, "json");

    $('.button-collaborators').on('click',function(e) {
        e.preventDefault();
        if (jQuery.inArray($('#input-collaborators').val(), collaborators) == -1) {
            for(var i=0;i<userId.length;i++){
                if($('#input-collaborators').val() == userId[i]['element'].email) {
                    inputId.push(userId[i]['element']['id']);
                }
            }
            collaborators.push($('#input-collaborators').val());
            rednerCollaborators();
            $('#input-collaborators').val("");
        }
    });
});
$(document).on('click','.remove', function() {
    collaborators.splice($(this).data("id"),1);
    inputId.splice($(this).data("id"),1);
    rednerCollaborators();
});

function rednerCollaborators() {
    $('#bloodhound-names').html("");
    for(var i=0;i<collaborators.length;i++) {
        $('#bloodhound-names').append('<span class="col-lab label label-info">'+collaborators[i]+' <i data-id="'+i+'" class="remove fa fa-times"></i></span>');
    }
    $('#collaborators_id').val("");
    $('#collaborators_id').val(inputId.toString().replace(new RegExp(",","g"), "-"));
    console.log($('#collaborators_id').val());
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
  name: 'names',
  displayKey: 'value',
  source: substringMatcher(names)
});
}

function categoryShow(id) {
    $.ajax({
        type    : "GET",
        url     : "/category/show/"+id,
        success : function(data) {
            data = jQuery.parseJSON(data);
            if (id==0) {
                $('#project_category').html("");
                for (var i=0; i<data.length; i++) {
                        $('<option value="'+data[i]['id']+'">'+data[i]['title']+'</option>').appendTo($('#project_category'));
                    }
                }
                else {
                    $('.subcategories').html("");
                    var x = 0;
                    for (var i=0; i<data.length; i++) {
                            $('<div class="subcheckbox"><input class="sub-checkbox" type="checkbox" name="subcategory_id" value="'+data[i]['id']+'"/><label for="subcategory"><span><span></span></span>'+data[i]['title']+'</label></div>"').appendTo($(' .subcategories') );
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
/*
function stateShow(id) {
    $.ajax({
        type    : "GET",
        url     : "/state/show/"+id,
        success : function(data) {
            data = jQuery.parseJSON(data);
            if (id==0) {
                $('#state').html("");
                for (var i=0; i<data.length; i++) {
                    $('<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>').appendTo($('#state'));
                    }
                }
            }
        },"json");

    return false;
}

function cityShow(id) {
    $.ajax({
        type    : "GET",
        url     : "/city/show/"+id,
        success : function(data) {
            data = jQuery.parseJSON(data);
                $('#city').html("");
                for (var i=0; i<data.length; i++) {
                    $('<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>').appendTo($('#city'));
                }
            }
        },"json");

    return false;
}
*/
//------
// on changes functions: category and state
//------


$(document).on('change', '#project_category', function(e) {
    e.preventDefault(e);

        //-----
        // TODO comments here
        //-----

    categoryShow($("#project_category").val());

});

/*
$(document).on('change', '#state', function(e) {
    e.preventDefault(e);

        //-----
        // TODO comments here
        //-----

    cityShow($("#state").val());

});
*/


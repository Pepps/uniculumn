var subcategories = [];
show(0);

$(function(){
    $.ajax({
        type    : 'GET',
        url     : '/user/show',
        success : function(data) {
            collaborator(data);
        }
    });

function collaborator(data) {
    // constructs the suggestion engine
    var data = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // `states` is an array of state names defined in "The Basics"
      local: $.map(data, function(firstname) { return { value: firstname }; })
    });

    // kicks off the loading/processing of `local` and `prefetch`
    states.initialize();

    $('#bloodhound .typeahead').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'data',
      displayKey: 'value',
      // `ttAdapter` wraps the suggestion engine in an adapter that
      // is compatible with the typeahead jQuery plugin
      source: states.ttAdapter()
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

var subcategories = [];
show(0);

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

function collaborator() {

    var collaborator = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      limit: 10,
      prefetch: {
        // url points to a json file that contains an array of user names, see
        // https://github.com/twitter/typeahead.js/blob/gh-pages/data/collaborator.json
        url: '/get-users',
        // the json file contains an array of strings, but the Bloodhound
        // suggestion engine expects JavaScript objects so this converts all of
        // those strings
        filter: function(list) {
          return $.map(list, function(user) { return { name: user }; });
        }
      }
    });

    // kicks off the loading/processing of `local` and `prefetch`
    collaborator.initialize();

    // passing in `null` for the `options` arguments will result in the default
    // options being used
    $('#prefetch .typeahead').typeahead(null, {
      name: 'collaborator',
      displayKey: 'name',
      // `ttAdapter` wraps the suggestion engine in an adapter that
      // is compatible with the typeahead jQuery plugin
      source: collaborator.ttAdapter()
    });

}

$(document).on('change', '#category', function(e) {
    e.preventDefault(e);

        //-----
        // TODO comments here
        //-----

    show($("#category").val());

});

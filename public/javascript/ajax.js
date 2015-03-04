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
$(document).on('change', '#category', function(e) {
    e.preventDefault(e);

        //-----
        // TODO comments here
        //-----

    show($("#category").val());

});

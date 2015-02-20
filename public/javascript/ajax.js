
show(0);

function show(id) {
    $.ajax({
        type    : "GET",
        url     : "/category/show/"+id,
        success : function(data) {
            data = jQuery.parseJSON(data);
            if (id==0) {
                $('#project-type').html("");
                for (var i=0; i<data.length; i++) {
                    $('<option value="'+data[i]['id']+'">'+data[i]['category_title']+'</option>').appendTo($('#project-type'));
                    }
                }
                else {
                    $('#subcategory-form').html("");
                    var x = 0;
                    for (var i=0; i<data.length; i++) {
                            $('<div class="checkbox"><input type="checkbox" name="category-form" value="'+data[i]['id']+'"/>'+data[i]['category_title']+"</div>").appendTo($(' #subcategory-form') );
                        }
                    }
                }

    }, "json");

    return false;
}
$(document).on('change', '#project-type', function(e) {
    e.preventDefault(e);

        //-----
        //
        //-----

    show($("#project-type").val());

});

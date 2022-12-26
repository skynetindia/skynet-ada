/*=== Shop Section START ==*/

/*=== Auto Complete For Shop Search ==*/

$("body").on("keyup", "#blog_autocomplete_search", function(ev) {

    if($(this).val().length<=0) {

        $(".ul_search_list_blog").addClass("opacity-none");

    }

    var keycode = (ev.keyCode ? ev.keyCode : ev.which);

    //console.log(keycode);

    if(keycode == '13') {

        var blog_search_route=$("#blog_list_route").val();

        if($("#blog_autocomplete_search").val().length>2) {

            var terms=$("#blog_autocomplete_search").val();

            var blog_search_route = $("#blog_search_route").val();

            blog_search_route = blog_search_route+'/'+terms;

        }

        window.location.href=blog_search_route;

    }

});



$("body").on("click", "#btn_search_blog", function(ev) {

    var blog_search_route=$("#blog_list_route").val();

    if($("#blog_autocomplete_search").val().length>2) {

        var terms=$("#blog_autocomplete_search").val();

        var blog_search_route = $("#blog_search_route").val();

        blog_search_route = blog_search_route+'/'+terms;

    }

    window.location.href=blog_search_route;

});





var blogInputComplete = $("#blog_autocomplete_search");

if(blogInputComplete.length) {



    var blog_autocomplete_route = $("#blog_autocomplete_route").val();



    blogInputComplete.autocomplete({

        minLength : 3,

        delay : 200,

        source : function(req, resp) {

            var nameTerm = {};

            nameTerm['searchterm'] = req.term;

            $.getJSON(blog_autocomplete_route, nameTerm, function(data) {

                resp(data);

            });

        },

        select : function(ev, ui) {

            blogInputComplete.val(ui.item.label);

            return false;

        },

        response: function( event, ui ) {

            $(".ul_search_list_blog").addClass("opacity-none");

            if(ui.content.length>0) {

                $(".ul_search_list_blog").removeClass("opacity-none");

            }

        },

        change: function( event, ui ) {

            //console.log('change');

        }

    }).autocomplete("instance")._renderMenu= function( ul, items ) {

        var that = this;

        var html='';

        $.each( items, function( index, item ) {

            html += item.html;

            //that._renderItemData( ul, item );

        });

        var ht=$(".ul_search_list_blog").html(html);

        $(ul).addClass('d-none');

        //$( ul ).find( "li" ).odd().addClass( "odd" );

    };

    /*.autocomplete("instance")._renderItem = function(ul, item) {

                    var ht=$(".ul_search_list_blog").html(item.html);

                    //return $(item.html).appendTo(ul);

                };*/

}



$("body").on("click", "#btn_link_to_comment", function(ev) {

    var $container = $("html,body");

    var $scrollTo = $('.blog-detail-form');

    $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top + $container.scrollTop(), scrollLeft: 0},300);

});

$("#blog_detail_breadcrumb").text($("#blog_name").text());
$("#blog_author_breadcrumb").text($("#author_name").val());



$("#frm_blog_comment").on("submit", function(ev) {

    ev.preventDefault();

    var retval = true;

    $(".mandatory").each(function(idx, select) {

        var value=$(this).find("input,select").val();

        //console.log($(this).find('input:radio:checked').length);

        if(value === null || value.trim() === "") {

            $(this).addClass("error");

            retval = false;

        }

    });



    if(retval==true) {

        Aimeos.createOverlay();

        $.ajax({

            url: $(this).attr("action")	,

            data: new FormData(this),

            processData: false,

            contentType: false,

            method: 'POST'

        }).done(function(data) {

            Aimeos.removeOverlay();

            var obj=jQuery.parseJSON(data);

            $("#blog_comment_msg").removeClass('d-none');

            $("#blog_comment_msg").html(obj.msg);

            if(obj.status=='success') {

                $(".blog_comment-item").each(function(idx, select) {

                    $(this).removeClass('error');

                    $(this).removeClass('success');

                    $(this).find("input,select,textarea").val('');

                    $(this).find('#is_save_detail').prop('checked',false);

                    $(this).find('#is_agree_term').prop('checked',false);

                });

                //window.scrollTo(0, 0);

                $("#blog_comment_msg").focus();

                $("#blog_comment_msg").removeClass('alert-danger');

                $("#blog_comment_msg").addClass('alert-success');

                //$("#frm_quotes").reset();

            }

            else {

                $("#blog_comment_msg").addClass('alert-danger');

                $("#blog_comment_msg").removeClass('alert-success');

            }

        });

        return false;

    }

    return false;



});

/*=== Shop Section END ==*/

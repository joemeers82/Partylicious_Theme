jQuery(function($) {
    $(".front_posts_navigation__li").each(function(e) {
        $(this).on("click", function(e) {
            $(this).addClass("dark_bg");
            $(this).siblings().removeClass("dark_bg");
            $value_start = $(this).val();
            $cat         = $(this).attr('name');
            
            e.preventDefault();

            $("html, body").animate({
                scrollTop: 500
            }, "500");

            $.ajax({
                method: "POST",
                url: main_ajax.ajax,
                data: {
                    action: "load_more_posts",
                    button_number: $value_start,
                    cat: $cat
                },
                success: function(a) {
                    $("#fp-article-posts-container").html(a)
                }
            })
        })
    })
});

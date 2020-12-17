$(document).ready(function() {
    show_menu();
    show_info();
    return false;
});





function show_menu() {
    $(".main_menu>li>a").click(function() {

        if ($(this).hasClass("abcxyz")) {

            $(this).next(".sub_menu").slideUp(500);
            $(this).removeClass("abcxyz");

        } else {
            $(".sub_menu").slideUp(500);
            $(this).next(".sub_menu").slideDown(500);
            $("ul.main_menu>li>a").removeClass("abcxyz")
            $(this).addClass("abcxyz");
        }

        // return false;


        //    $(".sub_menu").stop().slideUp(500);
        //    $(this).find(".sub_menu").stop().slideToggle(500);   

    });

};

function show_info() {
    $("#info_admin").click(function() {
        $("#dropdow_menu").stop().fadeToggle(1000);
    });
    $("#wp_content").click(function() {
        $("#dropdow_menu").stop().fadeOut(1000);
    })
}
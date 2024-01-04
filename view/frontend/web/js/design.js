require(['jquery'], function ($) {
    $(document).ready(function () {
        //loop through all the labels found
        $('.river-product-label').each(function (index) {
            //set default background color & font color
            if ($(this).attr('data-background-color')) {
                $(this).css("background-color", $(this).attr('data-background-color'));
            } else {
                $(this).css("background-color", '#ff0000');
            }
            if ($(this).attr('data-color')) {
                $(this).css("color", $(this).attr('data-color'));
            } else {
                $(this).css("color", '#ffffff');
            }

            if ($(this).attr('data-shape')) {
                $(this).addClass($(this).attr('data-shape'));
            }
            if ($(this).attr('data-position')) {
                $(this).addClass($(this).attr('data-position'));
            }
        });
        $('.river-label-image').each(function (index) {
            if ($(this).attr('data-position')) {
                $(this).addClass($(this).attr('data-position'));
            }
        });
    });
});
$(function() {
    $('.whishlist-account .account').on('click', function() {
        $('.accountdropdown').toggleClass('d-block');
    });
    $('.information').on('click', function() {
        $('.info-dropdown').toggleClass('d-block');
    });
    $('.beauty .catg-map-links .cat-links ul li').on('click', function() {
        $(this).next('div').toggleClass('d-block');
    });
    $('i.fa-heart').on('click', function() {
        $(this).toggleClass('active');
    });
    $('.product button.addtocart').on('click', function() {
        $('.show-product').css('top', '0');
        $('.show-product').css('opacity', '1');
        $('.cart').css('top', '23%');
        $('body').css('overflow', 'hidden');
    });
    $('.show-product i.fa-times').on('click', function() {
        $('.show-product').css('top', '-200%');
        $('.show-product').css('opacity', '0');
        $('.cart').css('top', '-100%');
        $('body').css('overflow', 'auto');
    });
    $('.bottom-cart').on('click', function() {
        $('.bottom-cart').toggleClass('cart-open');
        $('.bottom-cart-details').toggleClass('d-block');
    });
    $('.site-menue').on('click', function() {
        $('.beauty .catg-map-links').css('left', '-6%');
        $('.beauty .site-menue-content').css('display', 'block');
        $('.beauty .layout').css('display', 'block');
        $('body').css('overflow', 'hidden');
    });
    $('.beauty .site-menue-content ul li a').on('click', function() {


        $('body').css('overflow', 'auto');
    });
    $('.product-page').on('click', function() {
        $('.beauty .catg-map-links').css('left', '-6%');
        $('.beauty .product-page-content').css('display', 'block');
        $('.beauty .layout').css('display', 'block');
        $('body').css('overflow', 'hidden');
    });
    $('.beauty .x').on('click', function() {
        $('.beauty .catg-map-links').css('left', '-100%');
        $('.beauty .site-menue-content').css('display', 'none');
        $('.beauty .product-page-content').css('display', 'none');
        $('.beauty .layout').css('display', 'none');
        $('body').css('overflow', 'auto');
    });
    $('.products .filter p').on('click', function() {
        if ($(this).data('class') === 'all') {
            $('.product').css('display', 'block');
        } else {
            $('.product').css('display', 'none');
            $($(this).data('class')).css('display', 'block');
        }
    });

    $(function() {
        $("#showMore").click(function() {
            $("#boxs .product:hidden").slice(0, 3).slideDown();
            if ($("#boxs .product:hidden").length == 0) {
                $("#showMore").fadeOut("slow");
            }
        })

    });
});
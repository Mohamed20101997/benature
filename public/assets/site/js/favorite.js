$(document).ready(function(){

    $(document).on('click','.product__fav-icon' , function(){

       let url = $(this).data('url');
       let productId = $(this).data('id');
       let isFavored = $(this).hasClass('toggleActive');

        $('.product-'+ productId).toggleClass('toggleActive');


        if($('.product-'+ productId).closest('.favorite').length){

            $('.product-'+ productId).closest('.product').remove();
        }


        $.ajax({

            url:url,
            method:'POST',
            success:function(){



            }

        })


    })


});

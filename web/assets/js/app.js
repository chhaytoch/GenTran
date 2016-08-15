(function($){
    "use strict";
    var GenTran = {
        init: function(){
            this.keyString();
        },

        keyString: function() {
            $('.keystring-list > li').on('click', function() {
                var dataUrl = $(this).attr('data-url');
                // var postItemUrl = $('#post_item_url').val();
                // var dataUrl = document.location.origin + postItemUrl;
                // var currency = "USD";
                // if ($('#currency').val() == "Riel") {
                //     currency = "KHR";
                // }
                //
                // var categoriesValue = $('#categories-multiple-selected').val();
                // var data = {
                //     'id' : productObject.product.id,
                //     'name': $('#product-name').val(),
                //     'price': parseFloat($('#price').val()),
                //     'currency': currency,
                //     'categories' : categoriesValue
                // };
                //
                $.ajax({
                    type:'GET',
                    url: dataUrl,
                    success: function(data){
                        console.log(data.imagePath);
                        $('#context-preview').attr('src', data.imagePath);
                    }
                });
            });
        }
    };

    jQuery(document).ready(function(){
        GenTran.init();
    });
})(jQuery);
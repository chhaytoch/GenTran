(function($){
    "use strict";
    var GenTran = {
        init: function(){
            this.keyString();
        },

        keyString: function() {
            $('#save-product').on('click', function() {
                var postItemUrl = $('#post_item_url').val();
                var dataUrl = document.location.origin + postItemUrl;
                var currency = "USD";
                if ($('#currency').val() == "Riel") {
                    currency = "KHR";
                }

                var categoriesValue = $('#categories-multiple-selected').val();
                var data = {
                    'id' : productObject.product.id,
                    'name': $('#product-name').val(),
                    'price': parseFloat($('#price').val()),
                    'currency': currency,
                    'categories' : categoriesValue
                };

                $.ajax({
                    type:'POST',
                    contentType:'application/json',
                    data: JSON.stringify(data),
                    url: dataUrl,
                    success: function(data){
                        console.log(data.success);
                        if (data.success == false) {
                            alert(data.message);
                        } else if (data.success == true) {
                            window.location.reload();
                        }
                        window.location.reload();
                    }
                });
            });
        }
    };

    jQuery(document).ready(function(){
        GenTran.init();
    });
})(jQuery);
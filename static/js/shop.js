
addToCartRunning = false;

$(document).ready(function(){
    shop.init();
});

(function(shop, $, undefined) {

    shop.init = function() {
        $('.btn-cart').click(function(){
            var amountField = $(this).data("amount");
            var amount = 1;

            if(amountField) {
                var amountFieldInput = $('#' + amountField);

                if(amountFieldInput) {
                    amount = amountFieldInput.val();

                    if(amount <= 0) {
                        amount = 1;
                    }
                }
            }

            shop.addToCart($(this).data("id"), amount, $(this));
        });

        $('select.site-reload').change(function() {
            var val = $(this).val();

            var parsedUrl = $.url(window.location.href);
            var params = parsedUrl.param();

            params[$(this).attr("name")] = val;

            window.location.href = "?" + $.param(params);
        });

        $('.selectpicker[name=variant]').change(function() {
            window.location.href = $(this).find("[value=" + $(this).val() + "]").data("href");
        });
       
        if($('#shop-register-form').length > 0)
        {
            shop.initRegisterForm();
        }

        $('.price-rule').click(function() {
            $('#priceRule').val($(this).find(".price-rule-code").html())
        })

        $('.btn-compare').on('click', function(ev) {

            var $el = $(ev.target),
                product_id = $el.data("id");
            shop.addToCompareList( product_id, $el );
        });

        $('.btn-compare-remove').on('click', function( ev ) {

            var $el = $(ev.target),
                product_id = $el.data("id");
            shop.removeFromCompareList( product_id, $el );
        });

        $('.btn-wishlist').on('click', function(ev) {
            var $el = $(ev.target),
                product_id = $el.data("id");
            shop.addToWishList( product_id, $el );

        });

        $('.btn-wishlist-remove').on('click', function( ev ) {
            var $el = $(ev.target),
                product_id = $el.data("id");
            shop.removeFromWishList( product_id, $el );
        });

        shop.initChangeAddress();
        shop.addCartEventListeners();

        $(document.body).append( $('<div/>', {'id' : 'coreshop-bt-message'}) );

        $('.range-slider').slider({
            range : true
        });
    };

    shop.addCartEventListeners = function()
    {
        $('.removeFromCart').unbind("click");
        $('.removeFromCart').bind("click", function(){

            var button = $(this);

            shop.removeFromCart($(this).data("id"));
        });

        $('.cart-item-amount').unbind("change");
        $('.cart-item-amount').change(function(){
            shop.modifyCartItem($(this).data("id"), $(this).val());
        });
    };

    shop.addToCart = function(product_id, amount, sender, extraData, callback)
    {
        var data = $.extend({product : product_id, amount : amount}, extraData ? extraData : {});
        
        $.ajax({
            url : '/' + coreshop_language + '/shop/cart/add',
            data : data,
            dataType: 'json',
            success : function(result,status) {
                if(status == "success")
                {
                    if(result.success)
                    {
                        var imgtofly = $($(sender).data("img"));
                        
                        if(imgtofly.length > 0)
                        {
                            var cart = $('#cart');
                            var imgclone = imgtofly.clone();
                            
                            imgclone.offset({ top:imgtofly.offset().top, left:imgtofly.offset().left });
                            imgclone.css({'opacity':'0.7', 'position':'absolute', 'height':'150px', 'width':'150px', 'z-index':'1000'});
                            imgclone.appendTo($('body'));
                            imgclone.animate({'top':cart.offset().top + 10,'left':cart.offset().left + 30, 'width' : 55, 'height' : 55}, 1000);
                            imgclone.animate({'width':0, 'height':0}, function(){ $(this).detach() });
                        }

                        shop.updateCart(result);
                        
                        if(callback)
                            callback();
                    }
                    else {
                        alert(result.message);
                    }
                }
            }
        });
    };
    
    shop.removeFromCart = function(cartItem, callback)
    {
        $.ajax({
            url : '/' + coreshop_language + '/shop/cart/remove',
            data : {cartItem : cartItem},
            dataType: 'json',
            success : function(result,status,xhr) {
                if(status == "success")
                {
                    if(result.success)
                    {
                        shop.updateCart(result);
                        
                        if(callback)
                            callback();
                    }
                }
            }
        });
    };
    
    shop.modifyCartItem = function(cartItem, amount, callback)
    {
        $.ajax({
            url : '/' + coreshop_language + '/shop/cart/modify',
            data : {cartItem : cartItem, amount:amount},
            dataType: 'json',
            success : function(result,status,xhr) {
                if(status == "success")
                {
                    if(result.success)
                    {
                        shop.updateCart(result);
                        
                        if(callback)
                            callback();
                    }
                }
            }
        });
    };
    
    shop.updateCart = function(cart)
    {
        $('.shopping-cart-table').replaceWith(cart.cart);
        $('#cart').replaceWith(cart.minicart);

        shop.addCartEventListeners();
    };

    shop.addToCompareList = function(product_id, sender, extraData, callback)
    {
        var data = $.extend({product : product_id}, extraData ? extraData : {});

        $.ajax({
            url : '/' + coreshop_language + '/shop/compare/add',
            data : data,
            dataType: 'json',
            success : function(result,status,xhr) {
                if(status == "success")
                {
                    if(result.success)
                    {

                        shop.showMessage('product successfully added to compare list.');

                        if(callback)
                            callback();

                    } else {

                        shop.showMessage( result.message );
                    }
                }
            }
        });
    };

    shop.removeFromCompareList = function(product_id, sender, extraData, callback)
    {
        var data = $.extend({product : product_id}, extraData ? extraData : {});

        $.ajax({
            url : '/' + coreshop_language + '/shop/compare/remove',
            data : data,
            dataType: 'json',
            success : function(result,status,xhr) {
                if(status == "success")
                {
                    if(result.success)
                    {
                        sender.closest('.compare-block').remove();
                        window.location.reload();

                        if(callback)
                            callback();

                    }
                }
            }
        });
    };

    shop.addToWishList = function(product_id, sender, extraData, callback)
    {
        var data = $.extend({product : product_id}, extraData ? extraData : {});

        $.ajax({
            url : '/' + coreshop_language + '/shop/wishlist/add',
            data : data,
            dataType: 'json',
            success : function(result,status,xhr) {
                if(status == "success")
                {
                    if(result.success)
                    {
                        shop.showMessage('Product successfully added to Whishlist.');

                        if(callback)
                            callback();

                    } else {
                        shop.showMessage( result.message );
                    }
                }
            }
        });
    };

    shop.removeFromWishList = function(product_id, sender, extraData, callback)
    {
        var data = $.extend({product : product_id}, extraData ? extraData : {});

        $.ajax({
            url : '/' + coreshop_language + '/shop/wishlist/remove',
            data : data,
            dataType: 'json',
            success : function(result,status,xhr) {
                if(status == "success")
                {
                    if(result.success)
                    {
                        sender.closest('.whishlist-block').remove();
                        window.location.reload();

                        if(callback)
                            callback();
                    }
                }
            }
        });
    };

    shop.initRegisterForm = function()
    {
        if(fieldsToValidate !== undefined) {
            $('#shop-register-form').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok-circle',
                    invalid: 'glyphicon glyphicon-remove-circle',
                },
                excluded: ':disabled',
                fields: fieldsToValidate
            });
        }
    };

    shop.showMessage = function( message, type ) {

        $('#coreshop-bt-message').html('' +
        '<div class="modal fade" tabindex="-1" role="dialog">' +
        '  <div class="modal-dialog" role="document" style="z-index:1040;">' +
        '        <div class="modal-content">' +
        '        <div class="modal-header">' +
        '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>' +
        '        <h4 class="modal-title">Modal title</h4>' +
        '        </div>' +
        '        <div class="modal-body">' +
        '        <p>' + message + '</p>' +
        '        </div>' +
        '        <div class="modal-footer"> ' +
        '        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> ' +
        '        </div>' +
        '        </div>' +
        ' </div>' +
        '</div>');

        $('#coreshop-bt-message').find('.modal').modal();

    };
    
    shop.initChangeAddress = function()
    {
        $('select[name=shipping-address]').change(function(){
            var value = $(this).val();
            
            value = $(this).find("[value='"+value+"']").data("value");
            
            $('.panel-delivery-address').html($('#address-' + value).html());
            
            if($('[name=useShippingAsBilling]').is(":checked"))
            {
                $('.panel-billing-address').html($('#address-' + value).html());
                
                $('select[name=billing-address]').val($(this).val());
            }
        });
        
        $('select[name=billing-address]').change(function(){
            var value = $(this).val();
            value = $(this).find("[value='"+value+"']").data("value");
            
            $('.panel-billing-address').html($('#address-' + value).html());
        });
        
        $('[name=useShippingAsBilling]').change(function(){
            if($(this).is(":checked"))
            {
                $('.billing-address-selector').slideUp();
                
                var value = $('select[name=delivery-address] :selected').val();
                var htmlValue = $('select[name=delivery-address]').find("[value='"+value+"']").data("value");

                $('.panel-billing-address').html($('#address-' + htmlValue).html());
                
                $('select[name=billing-address]').val(value);
            }
            else
            {
                $('.billing-address-selector').slideDown();
            }
        });
    };
    
}( window.shop = window.shop || {}, jQuery ));
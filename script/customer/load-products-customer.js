"use strict";
// hide, show
function btnCart(){
    var x = document.getElementById("popover_content_wrapper");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }

}

// opciono
setTimeout(function (){


$(document).ready(function (){



    $('#show').click(function() {
        $('.menu').toggle("slide");
    });

    // load_products
    $.ajax({
        url: "https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/fetch_item.php",
        method: "POST",
        success: function (data) {
            $('#display_item').html(data);
        }
    });

    //load_cart_data
    $.ajax({
        url: "https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/fetch-cart.php",
        method: "POST",
        dataType:"json",
        success:function (data){
            $('#cart_details').html(data.cart_details);
            $('.total_price').text(data.total_price);
            $('.badge').text(data.total_item);
        }
    });

    $(document).on('click', '.add_to_cart', function(){

        var product_id = $(this).attr("id");
        var product_name = $('#name'+product_id+'').val();
        var product_price = $('#price'+product_id+'').val();
        var product_quantity = $('#quantity'+product_id).val();
        var action = "add";
        const targetDiv = document.getElementById("buttons");

        if(product_quantity > 0)
        {
            console.log(product_id);
            console.log(product_name);
            console.log(product_price);
            console.log(product_quantity);
            console.log(action);
            $.ajax({
                url:"https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/action.php",
                method:"POST",
                data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
                success:function(data)
                {
                    $.ajax({
                        url: "https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/fetch-cart.php",
                        method: "POST",
                        dataType:"json",
                        success:function (data) {
                            console.log(data);
                            $('#cart_details').html(data.cart_details);
                            $('.total_price').text(data.total_price);
                            $('.badge').text(data.total_item);

                            //Prikazivanje buttona i hajdovanje

                            if (data.total_item>0){
                                if (targetDiv.style.display === "none") {
                                    targetDiv.style.display = "block";
                                }

                            }
                        }
                    });
                    alert("Item has been Added into Cart");
                }
            });
        }
        else
        {
            alert("Please Enter Number of Quantity");
        }

    });
    $(document).on('click', '.delete', function(){

        var product_id = $(this).attr("id");
        var action = 'remove';

        const targetDiv = document.getElementById("buttons");

        if(confirm("Are you sure you want to remove this product?"))
        {
            $.ajax({
                url:"https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/action.php",
                method:"POST",
                data:{product_id:product_id, action:action},
                success:function()
                {
                    $.ajax({
                        url: "https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/fetch-cart.php",
                        method: "POST",
                        dataType:"json",
                        success:function (data){
                            $('#cart_details').html(data.cart_details);
                            $('.total_price').text(data.total_price);
                            $('.badge').text(data.total_item);

                            //Prikazivanje buttona i hajdovanje

                            if (data.total_item<=0){
                                if (targetDiv.style.display === "block") {
                                    targetDiv.style.display = "none";
                                } else {
                                    targetDiv.style.display = "block";
                                }
                            }
                        }
                    });
                    $('#cart-popover').popover('hide');
                    alert("Item has been removed from Cart");
                }
            })
        }
        else
        {
            return false;
        }
    });
    $(document).on('click', '#clear_cart', function(){

        var action = 'empty';

        const targetDiv = document.getElementById("buttons");

        $.ajax({
            url:"https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/action.php",
            method:"POST",
            data:{action:action},
            success:function()
            {
                $.ajax({
                    url: "https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/fetch-cart.php",
                    method: "POST",
                    dataType:"json",
                    success:function (data){
                        $('#cart_details').html(data.cart_details);
                        $('.total_price').text(data.total_price);
                        $('.badge').text(data.total_item);
                        //Prikazivanje buttona i hajdovanje

                        if (data.total_item<=0){
                            if (targetDiv.style.display === "block") {
                                targetDiv.style.display = "none";
                            } else {
                                targetDiv.style.display = "block";
                            }
                        }

                    }
                });
                // optional, depends on what customers prefer
                /*   var x = document.getElementById("popover_content_wrapper");
                   if (x.style.display === "block") {
                       x.style.display = "none";
                   }*/

            }
        });
    });
});}
    //opcioni
    , 1000);
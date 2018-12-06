var host = 'http://localhost/admin/';


$(document).ready(function() 
          {
            cartTotal();


          });


function addToCart(id) {
var qty = $("#qty").val();
jQuery.ajax({
type: "POST",
url:  host + "product/addToCart/"+id,
dataType: 'json',
data: {qty:qty},

success: function(res) {
alert('added to cart successfully');
location.reload();
}
 
})
}



function remove(id) {
jQuery.ajax({
type: "POST",
url:  host + "product/removeFromCart/"+id,
dataType: 'json',
data: {},

success: function(res) {
alert('Removed  from cart successfully');
location.replace(host+'product/view_cart');

}
 
})
}



function clearCart() {
jQuery.ajax({
type: "POST",
url:  host + "product/clearCart",
dataType: 'json',
data: {},

success: function(res) {
alert('cart cleared  successfully');
location.replace(host+'product/view_cart');

}
 
})
}



function cartTotal() {
jQuery.ajax({
type: "POST",
url:  host + "product/cartTotal",
dataType: 'html',
data: {},

success: function(res) {
$("#cart_total").html(res);
}
 
})
}



// Checkout Page Accordion Behaviour
$('#show_login').on('click', function() {
    $('#checkout_login').slideToggle(300);
});

$('#show_coupon').on('click', function() {
    $('#checkout_coupon').slideToggle(300);
});

$("#different_shipping").on("change", function() {
    $(".ship-box-info").slideToggle(300);
});

$("#create_account").on("change", function() {
    $(".new-account-info").slideToggle(300);
});


jQuery(document).ready(function($) {
    $('.front-banner .fadeOut,.front-banner .fadeOut1').owlCarousel({
        items: 1,
        animateOut: 'fadeOut',
        loop: true,
        margin: 10,
        nav: true,
        lazyLoad: true,
        dots: true,
    });
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: true,
                margin: 20
            }
        }
    })
//fix header on scroll
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
});
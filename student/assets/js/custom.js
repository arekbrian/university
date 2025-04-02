/**
*   Template Functions
*   Version: 1.0.0;
*   Author: GalibWeb
*   Copyright: GalibWeb @ 2018
*/

$(document).ready(function() {

    'use strict';

    //owl carousel main page
    $('.header-slider').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        // autoplay: true,
        // autoplayTimeout: 3000,
        dots: true,
        thumbs: true,
        thumbsPrerendered: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0:{
                items: 1
            },
            600:{
                items: 1,
            },
            1200:{
                items: 1
            }
        }
    });

    //owl carousel testimonial
    $('.testimonail-slider').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        thumbs: true,
        thumbsPrerendered: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0:{
                items: 1
            },
            600:{
                items: 1,
            },
            1200:{
                items: 1
            }
        }
    });

    //filter gallery with bs4
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });



});
jQuery( document ).ready(function( $ ) {
"use strict"

    $("#file").change(function(){
        $('#image_preview').html("");
        var total_file=document.getElementById("file").files.length;
        for(var i=0;i<total_file;i++)
        {
            $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
        }
    });
    $(".font-button-js").on("click", function(){
        var x = document.getElementById("js-toolbar");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    });
// accordeon
    $(".set > a").on("click", function(){
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).siblings('.content').slideUp(200);
            $(".set > a i").removeClass('fa-minus').addClass('fa-plus');
        }else{
            $(".set > a i").removeClass('fa-minus').addClass('fa-plus');
            $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
            $(".set > a").removeClass('active');
            $(this).addClass('active');
            $('.content').slideUp(200);
            $(this).siblings('.content').slideDown(200);
        }
    });
//
    $('tr[data-href]').on("click", function() {
        document.location = $(this).data('href');
    });

    /* Set the width of the side navigation to 250px */
    $(".menu-link").on("click", function(){
        document.getElementById("mySidenav").style.width = "250px";
    });
    /* Set the width of the side navigation to 0 */
    $(".closebtn").on("click", function(){
        document.getElementById("mySidenav").style.width = "0";
    });


    // Product Thumnbnail
    if (jQuery(".product-slider").length != '') {
        jQuery('.product-slider').bxSlider({
            pagerCustom: '#product-thumbs'
        });
    }

    // Upcoming Release
    if (jQuery(".init").length != '') {
        Books.init();
    }

    // Blog Slider
    if (jQuery("#blog-slider").length != '') {
        jQuery('#blog-slider').owlCarousel({
            loop:true,
            items : 1,
            nav:false,
            dots: true,
            smartSpeed:600
        })
    }

    // Thumbnail Post Slider
    if (jQuery(".post-thumbnail").length != '') {
        jQuery('.post-thumbnail').bxSlider({
            pagerCustom: '#thumbnail'
        });
    }

    // Event Map
    if (jQuery("#event-map").length != '') {
        jQuery("#event-map").gmap3({
            marker: {
                address: "Haltern am See, Weseler Str. 151"
            },
            map: {
                options: {
                    zoom: 16,
                    scrollwheel: false,
                }
            },
        });
    }

    // Contant Map
    if (jQuery("#contant-map").length != '') {
        jQuery("#contant-map").gmap3({
            marker: {
                address: "Haltern am See, Weseler Str. 151"
            },
            map: {
                options: {
                    zoom: 16,
                    scrollwheel: false,
                }
            },
        });
    }

    // Custom Scroll
    if (jQuery(".scroll-x").length != '') {
        jQuery(".scroll-x").mCustomScrollbar({
            axis:"x",
            advanced:{autoExpandHorizontalScroll:true},
            mouseWheel:false
        });
    }

    // Simple Masonry
    if (jQuery("").length != '') {
        jQuery('.simple-masonry').isotope({
            itemSelector: '.simple-masonry-grid'
        });
    }

    // Counters
    if (jQuery("#tc-counters").length != '') {
        try {
            jQuery('#tc-counters').appear(function () {
                jQuery('.tc-timer').countTo()
            });
        } catch (err) {}
    }

    // Wow Animation
    if (jQuery("").length != '') {
        var wow = new WOW({
            boxClass:     'animate',
            animateClass: 'animated',
            offset:       100,
            mobile:       false
            });
        wow.init();
    }

    // Auto height function
    if (jQuery(".fullscreen").length != '') {
        var setElementHeight = function () {
            var width = jQuery(window).width();
            /*if (jQuery('.tc-hero-slider li img') >= height) {*/
            var height = jQuery(window).height();
            jQuery('.fullscreen').css('height', (height));
            }
        //       else {
        //            jQuery('.autoheight').css('min-height', (800));
        //        }
        //};
        jQuery(window).on("resize", function () {
            setElementHeight();
        }).resize();
    }

    // Release Book Slider
    if (jQuery("").length != '') {
        if (jQuery(".release-book-slider").length != '') {
            jQuery('.release-book-slider').bxSlider({
                pagerCustom: '#release-thumb'
            });
        }
    }

    // Release Book Slider
    if (jQuery(".release-book-slider").length != '') {
        if (jQuery(".release-book-slider").length != '') {
            jQuery('.release-book-slider').bxSlider({
                pagerCustom: '#release-thumb'
            });
        }
    }


    // Quanity Box
    $(".ddd").on("click", function () {
        var $button = $(this);
        var $input = $button.closest('.sp-quantity').find("input.quntity-input");

        $input.val(function(i, value) {
            return +value + (1 * +$button.data('multi'));
        });
    });

    // Range slider
    if (jQuery("#slider-range").length != '') {
        jQuery( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 75, 300 ],
        slide: function( event, ui ) {
        jQuery( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
        });
        jQuery( "#amount" ).val( "$" + jQuery( "#slider-range" ).slider( "values", 0 ) +
        " - $" + jQuery( "#slider-range" ).slider( "values", 1 ) );
    }

    // Scroll to Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-top').fadeIn();
        } else {
            $('.back-top').fadeOut();
        }
    });
    $('.back-top').on("click", function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });


    var myEditor;
    ClassicEditor
        .create( document.querySelector( '#editor' ),
            {
                toolbar: [ 'bold', 'italic' ],
            }
        )
        .then( editor => {
            //console.log( editor );
            myEditor = editor;
        } )
        .catch( error => {
            //console.error( error );
        } );



    const button = document.querySelectorAll('.js-tex-insert');
    Array.from(button).forEach(i=> i.addEventListener("click", e => {
        var message = $('#demo-input').val();
        var value = myEditor.getData();
        myEditor.setData(value+ "$$" + message + "$$");
        $('#demo-input').val('');
        var value = myEditor.getData();
        startup();
        //console.log(value);
    }));

})


$(document).ready(function () {
    var heroSlider = $('.owl-one');
    heroSlider.owlCarousel({
        loop: true,
        items: 1,
        nav: true,
        dots: false,
        // autoplay: true,
        // autoplayTimeOut: 5000, //5sec
        navText: ['<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>'
        ], //we will be using font awesome icon here
    });

    heroSlider.on("changed.owl.carousel", function (event) {
        // selecting the current active item
        var item = event.item.index - 2;
        // first removing animation for all captions
        $('h3').removeClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h3, p, button').addClass('animated fadeInUp');
    })
})
$('.owl-two').owlCarousel({
    loop:true,
    nav:true,
    dots: false,
    navText: ['<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>'
        ], //we will be using font awesome icon here
    responsive:{
        0:{
            items:1
        },
        900:{
            item:3
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
$('.owl-three').owlCarousel({
    loop:true,
    nav: true,
    dots: false,
    navText: ['<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>'
        ], //we will be using font awesome icon here
        responsive:{
            0:{
                items:1
            },
            900:{
                item:3
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    
})

$('.owl-four').owlCarousel({
    loop:true,
    nav:true,
    dots: true,
    items: 1,
    animateOut: 'fadeOut',
    navText: ['<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>',
    '<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>'
], //we will be using font awesome icon here
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


$(document).ready(function() {
    $('#grid').click(function(event){event.preventDefault();$('#list').removeClass('on');$('#grid').addClass('on');$('#product .app-product').removeClass('list-style');$('#product .app-product').addClass('grid-style');});
    $('#list').click(function(event){event.preventDefault();$('#grid').removeClass('on');$('#list').addClass('on');$('#product .app-product').addClass('list-style');});
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).on('click','#filter_name-1', function(event){
    
    if ($('#agree').hasClass("filter_name-custom-checkbox-notchecked")) {
        
        $('#agree').removeClass("filter_name-custom-checkbox-notchecked");
        $('#agree').addClass("filter_name-custom-checkbox-checked");
        $('#label').addClass("bold-font");
        $('#agree').children( '.app__products__filters__radio__check').css( "display", "block" );
       
    } 
    else {
        
        $('#agree').removeClass("filter_name-custom-checkbox-checked");
        $('#agree').addClass("filter_name-custom-checkbox-notchecked");
        $('#label').removeClass("bold-font");
        $('#agree').children( '.app__products__filters__radio__check').css( "display", "none" );
}
});


$('button').on('click', function() {
    $(this).toggleClass('is-active');
  });

//   $('#search').on('click', function() {
//     $(this).append('<input type="text" name="myfieldname" value="myvalue" />');
//   });

//   $('button .search').on('click', function() {
//     if ($(this).find('.search').is("is-active")) {
//         $(this).append('<input type="hidden" name="myfieldname" value="myvalue" />');
//     } 
    
//   });

$('#user').on('click',function() {
   
    $('#myDropdown').toggleClass('show');

    if( $('#myDropdown').hasClass('show')){
        $('.logo_menu_part__icons-part_account').addClass('dropdown-user_border');
    }
    else{
        $('.logo_menu_part__icons-part_account').removeClass('dropdown-user_border');
    }
});

$( document ).ready(function() {
    $('.active a.clickable').on("click", function (e) {
        if ($(this).hasClass('panel-collapsed')) {
            // expand the panel
            $(this).parents('.active').find('.collapsein').slideDown();
            $(this).removeClass('panel-collapsed');
            $(this).find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
        else {
            // collapse the panel
            $(this).parents('.active').find('.collapsein').slideUp();
            $(this).addClass('panel-collapsed');
            $(this).find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        }
    });
    });


    $(".form-control").focus(function(){
        $( this ).next( "small" ).css( "display", "block" );
       }).blur(function() {
        $( this ).next( "small" ).css( "display", "none" );
      }); 


      $("input[type=checkbox]").change(function(){

        if($('#exampleCheckbox1').is(':checked') && $('#exampleCheckbox2').is(':checked')) {
            $(".create-account_button").removeClass('create-account_button-disabled')
            $(".create-account_button").addClass('create-account_button-active')
        }
        else{
            $(".create-account_button").removeClass('create-account_button-active')
            $(".create-account_button").addClass('create-account_button-disabled')
        }
    });

    // $(".series-attribute span").click(function(){
        
    //     $( this ).next( "p" ).css( "display", "block" );
    //    }).blur(function() {
    //     $( this ).next( "p" ).css("display", "none");
    //   }); 
      
      $(document).ready(function(){
        $('#tooltip-icon').on( "click", function (event) {
            
            if ($('.series-attribute p').hasClass('series-attribute_disappear')) {
                $('.series-attribute p').removeClass('series-attribute_disappear')
                $('.series-attribute p').addClass('series-attribute_appear')   
            }
            else {
                $('.series-attribute p').removeClass('series-attribute_appear')
                $('.series-attribute p').addClass('series-attribute_disappear')
            }
        });
             });


             $(document).ready(function() {
                // grab the initial top offset of the navigation 
                   var stickyNavTop = $('.nav').offset().top;
                   
                   // our function that decides weather the navigation bar should have "fixed" css position or not.
                   var stickyNav = function(){
                    var scrollTop = $(window).scrollTop(); // our current vertical position from the top
                         
                    // if we've scrolled more than the navigation, change its position to fixed to stick to top,
                    // otherwise change it back to relative
                    if (scrollTop > stickyNavTop) { 
                        $('.tab-menu_description').addClass('sticky');
                    } else {
                        $('.tab-menu_description').removeClass('sticky'); 
                    }
                };
    
                stickyNav();
                // and run it again every time you scroll
                $(window).scroll(function() {
                    stickyNav();
                });
            });

        
            $(document).ready(function(){
                $('#sign-in').on( "click", function (event) {
                    
                    if ($('#account-dropdown_menu-hidden').hasClass('account-dropdown_menu-hidden')) {
                        $('#account-dropdown_menu-hidden').closest('div').removeClass('account-dropdown_menu-hidden')
                        $('#account-dropdown_menu-hidden').addClass('account-dropdown_menu-visible')
                        $('.logo_menu_part__icons-part_account').addClass('logo_menu_part__icons-part_account_border')   
        
                    }
                    else {
                        $('#account-dropdown_menu-hidden').closest('div').removeClass('account-dropdown_menu-visible')
                        $('.logo_menu_part__icons-part_account').removeClass('logo_menu_part__icons-part_account_border') 
                        $('#account-dropdown_menu-hidden').addClass('account-dropdown_menu-hidden')
                    }
                })
            });


            ( function( $ ) {
                $( document ).ready(function() {
                $('#cssmenu li.has-sub>a').on('click', function(){
                        $(this).removeAttr('href');
                        var element = $(this).parent('li');
                        if (element.hasClass('open')) {
                            element.removeClass('open');
                            element.find('li').removeClass('open');
                            element.find('ul').slideUp();
                        }
                        else {
                            element.addClass('open');
                            element.children('ul').slideDown();
                            element.siblings('li').children('ul').slideUp();
                            element.siblings('li').removeClass('open');
                            element.siblings('li').find('li').removeClass('open');
                            element.siblings('li').find('ul').slideUp();
                        }
                    });
                
                });
            } )( jQuery );



            $(document).ready(function(){
                $("#search-hide").click(function(){
                  $(".search-input").hide();
                });
                $("#search-show").click(function(){
                  $(".search-input").show();
                });
              });  
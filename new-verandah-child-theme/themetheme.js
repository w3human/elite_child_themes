function sbVinetDone() {
    console.log('JOSH WAS HERE');
                                            
    sbVinetpABox("sbVinet-footer");
   
}

function elite_book_now() {
    jQuery('.main_booking_top_link').remove();
    jQuery('#primary-menu .menu-item-book').remove();

    jQuery("#main_booking_top").hide();
    jQuery("#mobile_booking_top").hide();
    
    if (window.innerWidth >= 742) {
        if (_is_euro == '1' ) {
            jQuery('.header-inner').append('<a href="https://eliteislandholidays.com/book/main.aspx?Clear=True&resort=verandah" target="_blank" class="btn book-now " style="display: inline-block;">Book Now</a>');
        }
        else {
            jQuery('.header-inner').append('<a href="https://verandah.eliteislandvacations.com/" target="_blank" class="btn book-now main_booking_top_link" style="display: inline-block;" onclick="event.preventDefault();">Book Now</a>');
        }

        jQuery(".main_booking_top_link").hover(
            function() {
                jQuery("#main_booking_top").show(); 
                jQuery("#main_booking_top").slideDown();
            },
            function() {
                //jQuery("#main_booking_top").slideUp();
            }
        );
        
        jQuery("#main_booking_top .bt-close").click(function(){
          jQuery("#main_booking_top").hide();
          jQuery("#mobile_booking_top").hide();
        });
     
        jQuery(".mobile_booking_top_link").click(function(){
            jQuery("#mobile_booking_top").toggle();
        });

        jQuery(".click-content").mouseover(function(){
            jQuery(".click-info").css("display", "block");
        });

        jQuery(".click-content").mouseout(function(){
            jQuery(".click-info").css("display", "none");
        });
    
        jQuery('.main_booking_top_link').click(function(){
            jQuery("html, body").animate({ scrollTop: 0 }, "slow");
            jQuery("#main_booking_top").show(); 
            jQuery("#main_booking_top").slideDown();
            //return false;
        });


    }
    else {
        if (_is_euro == '1' ) {
            jQuery('#primary-menu').append('<li class="menu-item-book"><a href="https://eliteislandholidays.com/book/main.aspx?Clear=True&resort=verandah" target="_blank" class="btn book-now main_booking_top_link" style="display: block; text-align: center;">Book Now</a></li>');
        }
        else {
            jQuery('#primary-menu').append('<li class="menu-item-book"><a href="https://verandah.eliteislandvacations.com/" target="_blank" class="btn book-now main_booking_top_link" style="display: block; text-align: center;">Book Now</a></li>');
        }
    }
}

elite_book_now();

window.addEventListener('resize', function(event) {
    elite_book_now();
}, true);

window.addEventListener('load', function(event) {

    jQuery(".popup .bt-close").click(function(){
        jQuery(".popup").hide();
    });

});

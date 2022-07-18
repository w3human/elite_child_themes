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
            jQuery('.header-inner #primary-menu').append('<li class="menu-item-book"><a href="https://eliteislandholidays.com/book/main.aspx?Clear=True&resort=pineapple" target="_blank" class="btn book-now " style="display: inline-block;">Book Now</a></li>');
        }
        else {
            jQuery('.header-inner #primary-menu').append('<li class="menu-item-book"><a href="https://losestablos.eliteislandvacations.com/"   target="_blank" class="btn book-now main_booking_top_link" style="display: inline-block;">Book Now</a></li>');
        }

          jQuery(".main_booking_top_link").hover(
            function() {

                if (window.innerWidth >= 742 && window.innerWidth <= 1239) {            
                    //jQuery(".popup#booking-pop-widget").addClass('open');
                }
                else {
                    jQuery("#main_booking_top").show(); 
                    jQuery("#main_booking_top").slideDown();
                }

            }
        );
      
        jQuery(".bt-close").click(function(){
          jQuery("#main_booking_top").hide();
          jQuery("#mobile_booking_top").hide();
        });
     
        jQuery(".main_booking_top_link").click(
            function(event) {
                event.preventDefault();
                
                if (window.innerWidth >= 742 && window.innerWidth <= 1239) {            
                    jQuery(".popup#booking-pop-widget").addClass('open');
                }
                else {
                   jQuery("#mobile_booking_top").toggle();
                }

            }
        );

        jQuery(".click-content").mouseover(function(){
            jQuery(".click-info").css("display", "block");
        });

        jQuery(".click-content").mouseout(function(){
            jQuery(".click-info").css("display", "none");
        });
    
       /* jQuery('.main_booking_top_link').click(function(){
            jQuery("html, body").animate({ scrollTop: 0 }, "slow");
            jQuery("#main_booking_top").show(); jQuery("#main_booking_top").slideDown();
            //return false;
        }); */

    }
    else {
        if (_is_euro == '1' ) {
            jQuery('#primary-menu').append('<li class="menu-item-book"><a href="https://eliteislandholidays.com/book/main.aspx?Clear=True&resort=losestablos" target="_blank" class="btn book-now main_booking_top_link" style="display: block; text-align: center;">Book Now</a></li>');
        }
        else {
            jQuery('#primary-menu').append('<li class="menu-item-book"><a href="https://losestablos.eliteislandvacations.com/" target="_blank" class="btn book-now main_booking_top_link" style="display: block; text-align: center;">Book Now</a></li>');
        }
    }
}

elite_book_now();

window.addEventListener('resize', function(event) {
    elite_book_now();
}, true);

window.addEventListener('load', function(event) {
    elite_book_now();

    jQuery('.open-booking-pop-widget').each(function() {
        jQuery(this).click(function(event) {
            event.preventDefault();
            jQuery(".popup#booking-pop-widget").addClass('open');
        });
    });

    jQuery(".popup .bt-close").each(function() {
        jQuery(this).click(function() {
            jQuery(".popup").each(function() { jQuery(this).removeClass('open') });
        });
    });

});

jQuery( document ).ready(function() {

	if (fart_options && fart_options.loading_effect) {
	   fart_init_loading_effects();
  	}

	jQuery('#navmain > div').on('click', function(e) {
			
		e.stopPropagation();

		// toggle main menu
		if ( jQuery(window).width() < 800 ) {

			var parentOffset = jQuery(this).parent().offset(); 
			
			var relY = e.pageY - parentOffset.top;
		
			if (relY < 36) {
			
				var firstChild = jQuery('ul:first-child', this);

        if (firstChild.css('right') == '-99999px')
            firstChild.css({'right': 'auto'});
        else
            firstChild.css({'right': '-99999px'});

        firstChild.parent().toggleClass('mobile-menu-expanded');
			}
		}
	});
	
	// add submenu icons class in main menu (only for large resolution)
	if ( jQuery(window).width() >= 800 ) {
	
		jQuery('#navmain > div > ul > li').has('ul').addClass('level-one-sub-menu');
		jQuery('#navmain > div > ul li ul li').has('ul').addClass('level-two-sub-menu');

    // add support of browsers which don't support focus-within
    jQuery('#navmain > div > ul > li > a:not(.search-form-icon), #navmain > div > ul > li > ul > li > a, #navmain > div > ul > li > ul > li > ul > li > a, .mega-menu-sub-menu')
      .on('mouseenter focus', function() {
        jQuery(this).closest('li.level-one-sub-menu').addClass('menu-item-focused');
        jQuery(this).closest('li.level-two-sub-menu').addClass('menu-item-focused');

        // hide cart mini cart popup content when focus menu links if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#cart-popup-content').length == 0 && jQuery('#cart-popup-content').css('right') != '-99999px')
          jQuery('#cart-popup-content').css('right', '-99999px');

        

        // hide search popup content when focus menu links if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#search-popup-content').length == 0 && jQuery('#search-popup-content').css('right') != '-99999px')
          jQuery('#search-popup-content').css('right', '-99999px');

        // show cart popup content when focus on mini cart popup link if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#cart-popup-content').length && jQuery('#cart-popup-content').css('right') == '-99999px') {
          
          var rootLi = jQuery(this).closest('#navmain > div > ul > li');
          var rightPos = (jQuery(window).width() - (rootLi.offset().left + rootLi.outerWidth()));
          var topPos = rootLi.offset().top - jQuery(window).scrollTop() + rootLi.outerHeight();

          jQuery('#cart-popup-content').css('right', rightPos).css('top', topPos);
        }

        

        // show search popup content when focus on search popup link if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#search-popup-content').length && jQuery('#search-popup-content').css('right') == '-99999px')
          jQuery('#search-popup-content').css('right', 'auto');
      }).on('mouseleave blur', function() {
          jQuery(this).closest('li.level-one-sub-menu').removeClass('menu-item-focused');
          jQuery(this).closest('li.level-two-sub-menu').removeClass('menu-item-focused');
    });										
	} else {


		jQuery('#navmain > div > ul > li').each(
	       function() {
	         if (jQuery(this).find('> ul.sub-menu').length > 0) {

	           jQuery(this).prepend('<span class="sub-menu-item-toggle"></span>');
	         }
	       }
	     );

	   jQuery('#navmain').on('focusin', function(){

      if (jQuery('#navmain > div > ul').css('right') == '-99999px') {

        jQuery('#navmain > div > ul').css({'right': 'auto'});
        jQuery('#navmain ul ul').css({'right': 'auto'}).css({'position': 'relative'});

        jQuery('.sub-menu-item-toggle').addClass('sub-menu-item-toggle-expanded');
      }
    });

	jQuery('#main-content-wrapper, #home-content-wrapper').on('focusin', function(){

      if (jQuery('#navmain > div > ul').css('right') != '-99999px') {
        jQuery('#navmain > div > ul').css({'right': '-99999px'});  
      }

    });

   jQuery('.sub-menu-item-toggle').on('click', function(e) {

	     var subMenu = jQuery(this).parent().find('> ul.sub-menu');

	     jQuery('#navmain ul ul.sub-menu').not(subMenu).css('right', '-99999px').css('position', 'absolute');
      jQuery('#navmain span.sub-menu-item-toggle').not(this).removeClass('sub-menu-item-toggle-expanded');
	     jQuery(this).toggleClass('sub-menu-item-toggle-expanded');
	     if (subMenu.css('right') == '-99999px') {

        subMenu.css({'right': 'auto'}).css({'position': 'relative'});
        subMenu.find('ul.sub-menu').css({'right': 'auto'}).css({'position': 'relative'});

     } else {

        subMenu.css({'right': '-99999px'}).css({'position': 'absolute'});
        subMenu.find('ul.sub-menu').css({'right': '-99999px'}).css({'position': 'absolute'});
     }
	   });
	}

	function fart_init_loading_effects() {

	    jQuery('.header-social-widget').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInLeft',
	            offset: 1
	          });

	    jQuery('#header-logo').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounce',
	            offset: 1
	          });

	    jQuery('#page-header').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    jQuery('#navmain a').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated rubberBand',
	            offset: 1
	          });

	    jQuery('#main-content-wrapper h2, #main-content-wrapper h3')
	            .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    jQuery('article img').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated zoomIn',
	            offset: 1
	          });

	    jQuery('#sidebar').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInRight',
	            offset: 1
	          });

	    jQuery('.before-content, .after-content').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounce',
	            offset: 1
	          });

	    jQuery('article p, article li')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated fadeInLeft',
	            offset: 1
	          });

	    jQuery('#footer-main h1, #footer-main h2, #footer-main h3')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    jQuery('#footer-main p, #footer-main ul, #footer-main li, .footer-title, .col3a, .col3b, .col3c')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated zoomIn',
	            offset: 1
	          });

	   	jQuery('#footer-menu')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInDown',
	            offset: 1
	          });
	}
	
	function fart_IsSmallResolution() {

		return (jQuery(window).width() <= 360);
	}

	function fart_IsMediumResolution() {
		
		var browserWidth = jQuery(window).width();

		return (browserWidth > 360 && browserWidth < 800);
	}

	function fart_IsLargeResolution() {

		return (jQuery(window).width() >= 800);
	}
	
	jQuery('#header-spacer').height(jQuery('#header-main-fixed').height());
	
	if (jQuery('#wpadminbar').length > 0) {
	
		jQuery('#header-main-fixed').css('top', jQuery('#wpadminbar').height() + 'px');
		jQuery('#wpadminbar').css('position', 'fixed');
	}
	
	jQuery(window).on('scroll', function () {
		if ( jQuery(this).scrollTop() > 120 ) {
			
			jQuery('.scrollup').fadeIn();
			jQuery('#header-top').hide();
            jQuery('#header-logo').addClass('header-logo-collapsed');
            jQuery('#navmain > div').addClass('navmain-collapsed');
			
		} else {
			
			jQuery('.scrollup').fadeOut();
			jQuery('#header-top').show();
            jQuery('#header-logo').removeClass('header-logo-collapsed');
            jQuery('#navmain > div').removeClass('navmain-collapsed');
		}
	});
	
	jQuery('#camera_wrap').camera({
				navigationHover : false,
		height: fart_IsLargeResolution() ? '450px' : '300px',
		loader: 'bar',
		pagination: true,
		thumbnails: false,
		time: 4500
	});

	jQuery('.scrollup').on('click', function () {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 500);
		
		return false;
	});
});
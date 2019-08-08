
jQuery(document).ready(function($) {

    $('#frame_wrapper iframe').load(function(){
       $(this).parent().removeClass('loading');
    });
    // theme switcher sidebar toggle

	$( "a.themes-open" ).on( "click", function(e) {
		$(this).toggleClass('selected');
		var productSlider = $('.theme-list');
		if($(productSlider).hasClass('open-demo')){
			$(productSlider).slideUp().removeClass('open-demo');
		} else {
			$(productSlider).slideDown().addClass('open-demo');
		}
	});
    // thumbnail preview hover
    $( ".wrap-theme-list li" ).on({
        mouseenter: function(){
            if($(this).find('img')[0]){
                $('img#preview').show();
                $('img#preview').attr('src',$(this).find('img').attr('src'));
            }else{
                $('img#preview').hide();
            }
        },
        mouseleave: function(){
            $( "#preview" ).hide();
        }
    });
	// thumbnail preview hover
    $( "#aside ul li" ).on({
	    mouseenter: function(){
	        var self = this;
	        $( "#preview" ).fadeOut('fast', function(){
	            $( this ).attr( "src", $( self ).attr( "data-thumbnail-src" ) ).show();
	        });
	    },
	    mouseleave: function(){
	        $( "#preview" ).hide();
	    }
	});
    
    // set iframe to correct height
    function fixHeight() 
    {
    	var headerHeight = $( "#wrapper" ).height();
    	$( "#iframe" ).attr( "height", ( ( $(window).height() - 0) - headerHeight) + 'px');
    }
    
    // fix iframe height on resize        	
    $(window).resize( function() {
    	fixHeight();
    }).resize();
    
    
    // theme list
    var theme_list_open = false;
    	
    $( "#theme_list li a" ).on( "click", function() 
    {
    	var theme_data = $( this ).attr( "rel" ).split( "," );
    	
    	// hide the theme list
    	$( "#push, #aside" ).toggleClass( "toggled" );
		$( "a.themes-open i" ).toggleClass( "icon-remove" );
		
		// reset data
		$( "a.themes-open" ).html( '<i class="icon-align-justify"></i> Choose Theme' );
		
		// setup links
		$( "li.purchase a" ).attr( "href", theme_data[1] );
        $( "li.remove_frame a" ).attr( "href", theme_data[0] );
        
        // show selected theme
        $( "#iframe" ).attr( "src", theme_data[0] );
        
        theme_list_open = false;
            	
    	return false;
    });
	
	// responsive switcher
	$( ".d" ).on( "click", function () {
        $( "#responsive li a.active" ).removeClass('active');
		$( "#frame_wrapper" ).removeClass().addClass( "desktop" );	
		$( ".ipad, .iphone, .desktop" ).removeClass( "active" );
		$( this ).addClass( "active" );
			
		return false;
	});
	
	$( ".t" ).on( "click", function () {
        $( "#responsive li a.active" ).removeClass('active');
		$( "#frame_wrapper" ).removeClass().addClass( "tablet" );	
		$( ".ipad, .iphone, .desktop" ).removeClass( "active" );
		$( this ).addClass( "active" );	
		
		return false;
	});
		        	
	$( ".m" ).on( "click", function () {
        $( "#responsive li a.active" ).removeClass('active');
		$( "#frame_wrapper" ).removeClass().addClass( "mobile" );
		$('.ipad,.iphone,.desktop').removeClass( "active" );
		$( this ).addClass( "active" );	
		
		return false;
	});
	
	$( ".d" ).addClass( "active" );
	$(document).on('click','#switcher .remove_frame a',function (e) {
		e.preventDefault();
		$('body').toggleClass('full-preview');
    })
});
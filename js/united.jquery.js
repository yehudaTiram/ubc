jQuery(document).ready(function($){

// fade team thumbnails on hover
    $(".teammate img").fadeTo("fast", 0.3); // This sets the opacity of the thumbs to fade down to 60% when the page loads
    $(".teammate img").hover(function(){
        $(this).fadeTo("fast", 1.0); // This sets 100% on hover
    },function(){
        $(this).fadeTo("fast", 0.3); // This should set the opacity back to 30% on mouseout
    });
    
// fade slideshow buttons on hover
    $("#hs .next,#hs .prev").fadeTo("fast", 0); // This sets the opacity of the thumbs to fade down to 60% when the page loads
    $("#hs .next,#hs .prev").hover(function(){
        $(this).fadeTo("fast", 1.0); // This sets 100% on hover
    },function(){
        $(this).fadeTo("fast", 0); // This should set the opacity back to 30% on mouseout
    });
    
// toggle product list on click
		$('.product-list li ul, .team-list li ul').hide();    
		$('.toggler, .product-list .current-menu-parent').click(function() {
		    var $this = $(this);
		    $this.next(".hidden, .product-list .sub-menu").slideToggle("fast", function() {
		        $this.find('span').text($(this).is(':visible') ? '-' : '+');
		    }); 
		});

});
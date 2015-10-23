jQuery(document).ready(function($) {
	
		/*@licstart  The following is the entire license notice for the 
        JavaScript code in this page.

        Copyright (C) 2014  ITstar

        The JavaScript code in this page is free software: you can
        redistribute it and/or modify it under the terms of the GNU
        General Public License (GNU GPL) as published by the Free Software
        Foundation, either version 3 of the License, or (at your option)
        any later version.  The code is distributed WITHOUT ANY WARRANTY;
        without even the implied warranty of MERCHANTABILITY or FITNESS
        FOR A PARTICULAR PURPOSE.  See the GNU GPL for more details.

        As additional permission under GNU GPL version 3 section 7, you
        may distribute non-source (e.g., minimized or compacted) forms of
        that code without the copy of the GNU GPL normally required by
        section 4, provided you include this license notice and a URL
        through which recipients can access the Corresponding Source.   


        @licend  The above is the entire license notice
        for the JavaScript code in this page. */
	
	
	
	/*-----------slidebars------------*/
	
	var menu = $('.menu-container');
	var menu_effects = menu.attr('id');
	
	console.log(menu_effects);
	$('.dl-menu .sub-menu').addClass('dl-submenu');
	$( "ul.dl-menu" ).unwrap();	 
	$( '#dl-menu' ).dlmenu({
		animationClasses : { classin : 'dl-animate-in-'+menu_effects, classout : 'dl-animate-out-'+menu_effects }
	});


	$('a.advancesearch,a#advancesearch-button,a.advancesearch-cancel').on('click', function(event){
		 event.preventDefault();
		$('div.advance-search-slide').slideToggle( "slow");
		});
				
			
		
  // Select first word of every paragraph in post format chat
  $('.format-chat .post-content p').each(function(){
    var text_splited = $(this).text().split(" ");
   $(this).html("<strong>"+text_splited.shift()+"</strong> "+text_splited.join(" "));
  });

								
		$.fn.windowCenter = function (event) {
			var mrtop = (($(window).height() - $(this).height()-35)/2);
			var mrleft = (($(window).width() - $(this).width()-35)/2);
			$(this).css('margin-top',mrtop);
			$(this).css('margin-left',mrleft);
			
			};
			
	 $(".post-content").fitVids();
	 
		
	 
});	
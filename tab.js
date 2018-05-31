jQuery(function($){ 

	var tab = $('.tab_face'); 
	tab.removeClass('js_off'); 
	function onSelectTab(){ 
		var t = $(this); 
		var myclass = []; 
		t.parentsUntil('.tab_face:first').filter('li').each(function(){ 
			myclass.push( $(this).attr('class') ); 
		}); 
		myclass = myclass.join(' '); 
		if (!tab.hasClass(myclass)) tab.attr('class','tab_face').addClass(myclass); 
	} 
	tab.find('li>a').click(onSelectTab).focus(onSelectTab); 
}); 
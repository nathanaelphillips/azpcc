$(function(){
	if(location.hash) {
		var loc = location.hash.substring(1);
		$("div#main section#"+loc).show();
		$("nav.secondary li."+loc+" a").addClass('active');
	}
	else {
		$("div#main section#intro").show();
	};
	
	
	$("nav.secondary li a").click( function(){
		$("nav.secondary li a").removeClass('active');
		$(this).addClass('active');
		var mainHgt = $("div#main section#intro").height();
		var secHgt = $("div#main section#"+$(this).parent().attr('class')).height();

			$("div#main section.info").fadeOut(250);
			$("div#main").animate( {
				minHeight: mainHgt+secHgt+"px" },
				500
				);
			$("div#main section#"+$(this).parent().attr('class')).delay(275).fadeIn(150);
	});
	
	$('#banner').crossSlide({
	  sleep: 5,
	  fade: 2
	}, [
	  { src: '/~nphillips/azpcc-wp/wp-content/themes/azpcc/img/banner1.png' },
	  { src: '/~nphillips/azpcc-wp/wp-content/themes/azpcc/img/banner2.png'   },
	  { src: '/~nphillips/azpcc-wp/wp-content/themes/azpcc/img/banner3.png'  }
	]);
	
});

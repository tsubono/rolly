var scrollTimer;
	var left = $(window).width();
	initMarquee();
	function initMarquee(){
	  var spanWidth = Math.max($(".scroll span").width(),$(window).width());
	  scrollTimer = setInterval(move,25);
	  $('.scroll').mouseenter(function(){
	    clearInterval(scrollTimer);
	  });
	  $('.scroll').mouseleave(function(){
	    scrollTimer = setInterval(move,25);
	  });
	  function move(){
	    $(".txt").css("left",left);
	    left -= 3;
	    if(left < -spanWidth){
	      $(".txt").css("left",$(window).width());
	      left = $(window).width();
	    }
	  }
	}

	var idDraging = false;
	var delta;
	$('.scroll').mousedown(function(e){
	  isDraging = true;
	  var prePageX = e.pageX;
	  var currPageX = prePageX;
	  console.log("mousedown"+" prePageX: "+e.pageX);
	  $(".scroll").unbind('mousemove').bind('mousemove',function(e){

	    if(isDraging){
	      prePageX = currPageX;
	      currPageX = e.pageX;
	      left = left + (currPageX - prePageX);
	      $(".txt").css("left",left);
	      console.log("move step " + (currPageX - prePageX) );
	    }
	  });
	}).mouseup(function(){
	  isDraging = false;
	  console.log("mouseup");
	});
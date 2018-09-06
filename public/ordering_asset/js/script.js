$(document).ready(function(){
	console.log($('meta[name="csrf-token"]').attr('content'));
	$.ajaxSetup({
	    headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});


	$('[data-toggle="popover"]').popover(); 
	$('.popover-dismiss').popover({
		trigger: 'focus'
	});

	//CARD SLIDER
	var x,left,down, prev;

	$(".kitch-main").mousedown(function(e){
		e.preventDefault();
		down = true;
		x = e.pageX;
		left = prev;
	});

	$("body").mousemove(function(e){
		if(down){
		    var newX = e.pageX;
  
		    $(".orders").scrollLeft(left - newX + x);   
		}
	});

	$("body").mouseup(function(e){ 
		down = false; 
		prev = $(".orders").scrollLeft();
	});

	/*$(this).contextmenu(function(){
		return false;
	});	*/
	//END OF CARD SLIDER
});
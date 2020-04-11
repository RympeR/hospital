function fotbot() {
	var h = $(".pagebottom").height();
	$(".pagetop").css({"min-height":"calc(100vh - "+h+"px)"});
}

$(window).on("resize",function () {
	fotbot();
});

$(function(){
	fotbot();

	$(".to_show").on("click",function () {
		$(this).toggleClass("selected").next(".hidden").slideToggle();
		return false;
	});

});
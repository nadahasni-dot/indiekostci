$(window).scroll(function () {
	if ($(this).scrollTop() > 100) {
		$('#header').addClass('header-scrolled');
	} else {
		$('#header').removeClass('header-scrolled');
	}
});

if ($(window).scrollTop() > 100) {
	$('#header').addClass('header-scrolled');
}

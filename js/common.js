$('header .menu .toggler').click(function() {
	$(this).toggleClass('active');
	$(this).siblings('.collapse').toggleClass('show');
	$('body').toggleClass('without-scroll')
})

$('.quantity button').click(function(event) {
	event.preventDefault()
	let input = $(this).siblings('input')

	if ($(this).text() == '+') {
		input.val(+input.val() + 1)
	} else if (+input.val() !== 0) {
		input.val(+input.val() - 1)
	}
})

var header = $('header .nav-hidden'),
	scrollPrev = 0;

$(window).scroll(function() {
	let scrolled = $(window).scrollTop()
	if (scrolled > 100 && scrolled > scrollPrev) {
		header.addClass('out')
	} else if (!(scrolled > 100)) {
		header.removeClass('out')
	}

	scrolledPrev = scrolled;
});

$('.update-basket').click(function() {
	let post_id = $(this).parents('article').attr('id');
	post_id = post_id.replace('post-', '');
	add_to_cart(post_id)
})

function add_to_cart(post_id) {
	var data = {
		action: 'add_to_cart_quantity',
		post_id: post_id,
		count: 2,
		variation: 0
	};

	// 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()
	$.post( ajax_url.url, data);
}

$('.basket').hover(function() {
	$(this).siblings('.mini-cart-wrapper').addClass('visible')
}, function() {
	let outed = true;
	setTimeout(function () {
		console.log('moueleave')
	}, 2000);
})

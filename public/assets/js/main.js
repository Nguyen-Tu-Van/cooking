$(function() {

    var owl = $('.slide-one-item');

    $('.slide-one-item').owlCarousel({
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 0,
        autoplayHoverPause: true,
        smartSpeed: 5000,
        autoplaySpeed: 1000,
        autoplay: true,
        dots: false,
        nav: false,
        navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
    });

    $('.thumbnail li').each(function(slide_index){
        $(this).click(function(e) {
            owl.trigger('to.owl.carousel',[slide_index,1000]);
            e.preventDefault();
        })
    })

    owl.on('changed.owl.carousel', function(event) {
        $('.thumbnail li').removeClass('active');
        $('.thumbnail li').eq(event.item.index-3).addClass('active');
    })

	
})
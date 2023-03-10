$('#post_related_slide').owlCarousel({
    loop:false,
    margin:20,
    nav:true,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    },
    navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"]
})

function openNav() {
    document.getElementById("navMB").style.width = "100%";
}

function closeNav() {
    document.getElementById("navMB").style.width = "0";
}

$('.show-child-menu').click(function() {
    $(this).toggleClass('active');
    $(this).next().toggle(300);
    // $(this).next().toggleClass('show-child');
});

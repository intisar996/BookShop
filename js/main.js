$(function() {

	if ( $('.owl-2').length > 0 ) {
        $('.owl-2').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: true,
            nav: true,
            dots: true,
            pauseOnHover: false,
            responsive:{
                600:{
                    margin: 20,
                    nav: true,
                  items: 2
                },
                1000:{
                    margin: 20,
                    stagePadding: 0,
                    nav: true,
                  items: 3
                }
            }
        });            
    }

})

const images = document.querySelectorAll('.first_img img');
let currentImage = 0;

function changeImage() {
images[currentImage].classList.remove('active');
currentImage = (currentImage + 1) % images.length;
images[currentImage].classList.add('active');
}

setInterval(changeImage, 5000);





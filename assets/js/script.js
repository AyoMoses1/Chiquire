$(document).ready(function() {

    // Mobile Dropdown Menu

    $(".menu-btn").on("click", function() {
        $("header .navigation").toggleClass("show");
    });

    // Scroll Sticky Header

    if ($(window).width() > 750 ) {
      $(window).scroll(function(){
        if ($(this).scrollTop() > 80 ) {
          $("header").css("height", "0");
        } 
        else {
          $("header").css("height", "70px");
        }
        if ($(this).scrollTop() > 360) {
          $('header').addClass("fixed-top");
          $("header").css("height", "70px");
        }
        else {
          $('header').removeClass("fixed-top");
        } 
      });
    }

    // Slick Carousel

    $('.slide-container').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: $(".next"),
        prevArrow: $(".prev"),
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 750,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 550,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });  

      // CK Editor

      ClassicEditor.create( document.querySelector( '#body' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );

});
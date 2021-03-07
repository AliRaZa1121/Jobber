$('#play_button').click(function () {
   $('#videomodal').modal().show()
});
(function($) {

    /**
     * Copyright 2018, Muhammad Ashar nizam
     *     only accounts for vertical position, not horizontal.
     */
  
    $.fn.visible = function(partial) {
      
        var $t            = $(this),
            $w            = $(window),
            viewTop       = $w.scrollTop(),
            viewBottom    = viewTop + $w.height(),
            _top          = $t.offset().top,
            _bottom       = _top + $t.height(),
            compareTop    = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;
      
      return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
  
    };
      
  })(jQuery);
  
  // $(window).scroll(function(event) {
    
  //   $("section, .an-footer, section.text-section h4, section.text-section h2").each(function(i, el) {
  //     var el = $(el);
  //     if (el.visible(true)) {
  //       el.addClass("fadeIn"); 
  //     } else {
  //       el.removeClass("fadeIn");
  //     }
  //   });
    
  // });
  // $(document).ready(function(event) {
    
  //   $("section, .an-footer, section.text-section h4, section.text-section h2").each(function(i, el) {
  //     var el = $(el);
  //     if (el.visible(true)) {
  //       el.addClass("fadeIn"); 
  //     } else {
  //       el.removeClass("fadeIn");
  //     }
  //   });
  // });
$('.navbar-toggler').click(function(){
  $('body').toggleClass('opennav')
})

// $(window).scroll(function(event) {
    
//   $("div.text-section").each(function(i, el) {
//     var el = $(el);
//     if (el.visible(true)) {
//       el.addClass("slideIn"); 
//     } else {
//       el.removeClass("slideIn");
//     }
//   });
  
// });
// $(document).ready(function(event) {
  
//   $("div.text-section").each(function(i, el) {
//     var el = $(el);
//     if (el.visible(true)) {
//       el.addClass("slideIn"); 
//     } else {
//       el.removeClass("slideIn");
//     }
//   });
// });
$('.navbar-toggler').click(function(){
$('body').toggleClass('opennav')
})


$(window).scroll(function(event) {
    
  $("#video").each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      video = document.getElementById('video');

      video.play();
  
  
  video.onPlay = function() {
      if (video.requestFullscreen) {
         video.requestFullscreen();
      } else if (video.msRequestFullscreen) {
         video.msRequestFullscreen();
      } else if (video.mozRequestFullScreen) {
         video.mozRequestFullScreen();
      } else if (video.webkitRequestFullscreen) {
         video.webkitRequestFullscreen();
  }
  };
  
  video.onended = function(e) {
    if(video.exitFullscreen) {
      video.exitFullscreen();
    } else if(video.mozCancelFullScreen) {
      video.mozCancelFullScreen();
    } else if(video.webkitExitFullscreen) {
      video.webkitExitFullscreen();
    }
  };
      //el.addClass("video-full"); 
    }
    // } else {
    //   el.removeClass("video-full");
    // }
  });
  
});
// $(document).ready(function(event) {
  
//   $("#video").each(function(i, el) {
//     var el = $(el);
//     if (el.visible(true)) {
     
//       //el.addClass("video-full"); 
//     } else {
//       el.removeClass("Video-full");
//     }
//   });
// });
$('.navbar-toggler').click(function(){
$('body').toggleClass('opennav')
})
// var video = document.createElement('video');

// video.src = 'http://127.0.0.1:8000/front/video/dummy.mp4';
// video.style.width = window.innerWidth;
// video.style.height = window.innerHeight;
// video.autoPlay = true;

// document.getElementById('video2').appendChild(video);



$('.add-slider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
  autoplay: true,
  prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  cssEase: 'cubic-bezier(1, 0, 0.3, 1)',
  speed: 5000,
});
$('.img-slider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
  autoplay: true,
  arrows: false,
  fade: true,
  speed: 500,
  autoplaySpeed:5000,
  infinite: true,
  touchThreshold: 100
});
$("ul.navbar-nav img, .mobile-nav img").click(function () {
  $('html, body').animate({
      scrollTop: $(".contact-info-sect").offset().top
  }, 2000);
});
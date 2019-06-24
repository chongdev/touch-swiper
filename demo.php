<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=1">
	
	<meta name="theme-color" content="#000">
	<title></title>


	<link rel="stylesheet" type="text/css" href="t1.css">

	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<div style="text-align: center;">slider: <span id="slider">false</span></div>
<div style="text-align: center;">msMaxTouchPoints: <span id="msMaxTouchPoints">false</span></div>
<div class="slider-wrap">
  <div class="slider" id="slider">
    <div class="holder">

      <div class="slide-wrapper">
        <div class="slide"><img class="slide-image" src="http://farm8.staticflickr.com/7347/8731666710_34d07e709e_z.jpg" /></div>
        <span class="temp">74</span>
      </div>
      <div class="slide-wrapper">
        <div class="slide"><img class="slide-image" src="http://farm8.staticflickr.com/7384/8730654121_05bca33388_z.jpg" /></div>
        <span class="temp">64</span>
      </div>
      <div class="slide-wrapper">
        <div class="slide"><img class="slide-image" src="http://farm8.staticflickr.com/7382/8732044638_9337082fc6_z.jpg" /></div>
        <span class="temp">82</span>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
	
if ( navigator.msMaxTouchPoints ) {

	$('#msMaxTouchPoints').text('true');
  $('#slider').addClass('ms-touch');

  $('#slider').on('scroll', function() {
    $('.slide-image').css('transform','translate3d(-' + (100-$(this).scrollLeft()/6) + 'px,0,0)');
  });

} else {

	$('#slider').text('true');
  var slider = {

    el: {
      slider: $("#slider"),
      holder: $(".holder"),
      imgSlide: $(".slide-image")
    },

    slideWidth: $('#slider').width(),
    touchstartx: undefined,
    touchmovex: undefined,
    movex: undefined,
    index: 0,
    longTouch: undefined,
    
    init: function() {
      this.bindUIEvents();
    },

    bindUIEvents: function() {

      this.el.holder.on("touchstart", function(event) {
        slider.start(event);
      });

      this.el.holder.on("touchmove", function(event) {
        slider.move(event);
      });

      this.el.holder.on("touchend", function(event) {
        slider.end(event);
      });

    },

    start: function(event) {
      // Test for flick.
      this.longTouch = false;
      setTimeout(function() {
        window.slider.longTouch = true;
      }, 250);

      // Get the original touch position.
      this.touchstartx =  event.originalEvent.touches[0].pageX;

      // The movement gets all janky if there's a transition on the elements.
      $('.animate').removeClass('animate');
    },

    move: function(event) {
      // Continuously return touch position.
      this.touchmovex =  event.originalEvent.touches[0].pageX;
      // Calculate distance to translate holder.
      this.movex = this.index*this.slideWidth + (this.touchstartx - this.touchmovex);
      // Defines the speed the images should move at.
      var panx = 100-this.movex/6;
      if (this.movex < 600) { // Makes the holder stop moving when there is no more content.
        this.el.holder.css('transform','translate3d(-' + this.movex + 'px,0,0)');
      }
      if (panx < 100) { // Corrects an edge-case problem where the background image moves without the container moving.
        this.el.imgSlide.css('transform','translate3d(-' + panx + 'px,0,0)');
      }
    },

    end: function(event) {
      // Calculate the distance swiped.
      var absMove = Math.abs(this.index*this.slideWidth - this.movex);
      // Calculate the index. All other calculations are based on the index.
      if (absMove > this.slideWidth/2 || this.longTouch === false) {
        if (this.movex > this.index*this.slideWidth && this.index < 2) {
          this.index++;
        } else if (this.movex < this.index*this.slideWidth && this.index > 0) {
          this.index--;
        }
      }      
      // Move and animate the elements.
      this.el.holder.addClass('animate').css('transform', 'translate3d(-' + this.index*this.slideWidth + 'px,0,0)');
      this.el.imgSlide.addClass('animate').css('transform', 'translate3d(-' + 100-this.index*50 + 'px,0,0)');

    }

  };

  slider.init();
}
</script>
</body>
</html>
/*
 *
 * ABOUT PAGE Animation JS
 * Dependency : aboutUSanimate.css
 * */

var mySwiper = new Swiper(".leadership__swiper", {
  direction: "horizontal",
  loop: false,
  slidesPerView: "auto",
  speed: 1000,
  mousewheel: true,
  keyboard: true,
  grabCursor: true,
  on: {
    reachEnd: function () {
      if (this.isEnd) {
        this.params.mousewheel.releaseOnEdges = true;
      }
    },
    slideChangeStart: function () {
      this.params.mousewheel.releaseOnEdges = false;
    },
  }, // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

function startCarousel(selector, numItem = 3) {
  let items = document.querySelectorAll(selector);

  items.forEach((el) => {
    const minPerSlide = numItem;
    let next = el.nextElementSibling;
    for (var i = 1; i < minPerSlide; i++) {
      if (!next) {
        // wrap carousel by using first child
        next = items[0];
      }
      let cloneChild = next.cloneNode(true);
      el.appendChild(cloneChild.children[0]);
      next = next.nextElementSibling;
    }
  });
}
startCarousel("#bestSellerCarousel.carousel .carousel-item");
startCarousel("#peopleSayingCarousel.carousel .carousel-item");

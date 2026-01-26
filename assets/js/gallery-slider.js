(function () {

  const track = document.getElementById('galleryTrack');
  if (!track) return;

  const slides = Array.from(track.children);
  const prev = document.querySelector('.gallery__arrow--prev');
  const next = document.querySelector('.gallery__arrow--next');

  let index = 0;

  function perView() {
    return window.matchMedia('(max-width: 991px)').matches ? 1 : 2;
  }

  function maxIndex() {
    return Math.max(0, slides.length - perView());
  }

  function update() {
    const pv = perView();
    const percent = (index * 100) / pv;
    track.style.transform = 'translateX(-' + percent + '%)';
    prev.classList.toggle('is-disabled', index === 0);
    next.classList.toggle('is-disabled', index >= maxIndex());
  }

  prev.addEventListener('click', function (e) {
    e.preventDefault();
    index = Math.max(0, index - perView());
    update();
  });

  next.addEventListener('click', function (e) {
    e.preventDefault();
    index = Math.min(maxIndex(), index + perView());
    update();
  });

  window.addEventListener('resize', update, { passive: true });

  update();

})();

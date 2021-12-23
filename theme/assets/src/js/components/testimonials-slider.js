// import SimpleBar from 'simplebar';
import OverlayScrollbars from 'overlayscrollbars';
import Glide from '@glidejs/glide';

/**
 * stuffs
 */
import {
  elements,
} from "../../config/nodes";

/**
 * sliders
 */
export function initSlider(ImagesLoaded) {
  let slider = elements.frontPage.testimonials;

  const slides = slider.querySelector('[data-glide-el="track"]>ul');
  const count = slides.childElementCount;
  const maxSlides = 1;

  slider = new Glide(slider, {
    type: 'carousel',
    perView: (count < maxSlides) ? count : maxSlides,
    // autoplay: (count <= maxSlides) ? false : 5000
    autoplay: false
  });

  slider.mount();
}

/**
 * scrollbars
 */
export function initSimpleBar(e) {
  const scrollElements = elements.frontPage.testimonialContent;

  const instances = OverlayScrollbars(scrollElements, {
    className: "os-theme-thin-light",
    paddingAbsolute: true,
    overflowBehavior: {
      x: 'hidden',
      y: 'visible-hidden',
    },
    scrollbars: {
      visibility: 'auto',
      autoHide: "leave",
      autoHideDelay: 300
    }
  });

  // instances.forEach(instance => {
  //   let overflow = instance.getState('hasOverflow').y;

  //   if (true === overflow) {

  //     instance.getElements('target').querySelector('.os-content').classList.add('fix-os-scroll');
  //   }
  // })

  // Array.from(scrollElements).forEach(el => el = new SimpleBar(el, {
  //   autoHide: false
  // }));
}

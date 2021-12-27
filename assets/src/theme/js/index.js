import 'core-js/stable';
import "regenerator-runtime/runtime";

import { state } from './state';
import { config } from './config';
import { elements, toggleScroll } from './views/base';
import * as navbar from "./views/navbar";
import * as header from "./views/header";

/**
 *
 */
window.state = state;
// Aos.init();

/**
 *
 */
if ('grecaptcha' in window) {
  grecaptcha.ready(() => {
    grecaptcha.execute(config.reCapcha.key, { action: 'contact' }).then((token) => {
      elements.forms.reCaptcha.value = token;
    });
  });
}

/**
 *
 */
document.addEventListener('scroll', (e) => {
  if (!state.navbar.open) {
    transformNavbar(e);
  }
})

/**
 *
 */
elements.navbar.toggler.addEventListener('click', (e) => {

  const colorChanged = state.navbar.color.changed;
  const passedThreshold = state.navbar.color.threshold;

  if (false === state.navbar.open) {

    if (!passedThreshold && !colorChanged) {
      toggleNavbarColor(true)
      navbar.fixPosition()
    }

    toggleScroll('hidden');
    navbar.showNavItems().toggleToggler('close');
    state.navbar.open = true;

  } else {

    if (!passedThreshold && colorChanged) {
      toggleNavbarColor(false);
      navbar.releasePosition()
    }

    toggleScroll('scroll');
    navbar.hideNavItems().toggleToggler('open');
    state.navbar.open = false;
  }
})

/**
 *
 */
function toggleNavbarColor(toggle) {
  navbar.toggleColor()
  state.navbar.color.changed = toggle
}

/**
 *
 */
function transformNavbar(e) {

  const scrollStart = window.scrollY;
  const startChange = header.bottom - navbar.height / 2;

  //
  if (scrollStart > startChange) {
    navbar.fixPosition()
    state.navbar.fixed.set = true;
    state.navbar.fixed.threshold = true;

    if (!state.navbar.color.changed) {
      toggleNavbarColor(true)
      state.navbar.color.threshold = true
    }
  }

  //
  if (scrollStart < startChange) {
    navbar.releasePosition()
    state.navbar.fixed.set = true;
    state.navbar.fixed.threshold = true;

    if (state.navbar.color.changed) {
      toggleNavbarColor(false)
      state.navbar.color.threshold = false
    }
  }

  return this;
}

/**
 *
 */
export const selectors = {
  forms: {
    reCaptcha: "#g-recaptcha-response"
  },

  navbar: {
    root: "#navbar",
    toggler: ".navbar-toggler",
    togglerIcon: "#toggler-icon",
    collapse: "#navbar-menu",
    menu: ".navbar-nav",
    items: ".nav-item",
    logo: ".navbar-brand"
  },

  header: {
    root: "#header"
  }
};

/**
 *
 */
export const elements = {
  html: document.querySelector("html"),
  body: document.querySelector("body"),

  forms: {
    reCaptcha: document.querySelector(selectors.forms.reCaptcha)
  },

  navbar: {
    root: document.querySelector(selectors.navbar.root),
    toggler: document.querySelector(selectors.navbar.toggler),
    togglerIcon: document.querySelector(selectors.navbar.togglerIcon),
    collapse: document.querySelector(selectors.navbar.collapse),
    menu: document.querySelector(selectors.navbar.menu),
    items: document.querySelectorAll(selectors.navbar.items),
    logo: document.querySelector(selectors.navbar.logo)
  },

  header: {
    root: document.querySelector(selectors.header.root)
  }
};

/**
 *
 */
export function toggleScroll(toggle) {
  elements.html.style.overflowY = toggle;

  return this;
}

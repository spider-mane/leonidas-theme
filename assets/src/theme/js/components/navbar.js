import { elements } from "../views/base";

const selectors = {
  root: "#navbar",
  toggler: ".navbar-toggler",
  togglerIcon: "#toggler-icon",
  collapse: "#navbar-menu",
  menu: ".navbar-nav",
  items: ".nav-item",
  logo: ".navbar-brand"
};

const elements = {
  root: document.querySelector(selectors.root),
  toggler: document.querySelector(selectors.toggler),
  togglerIcon: document.querySelector(selectors.togglerIcon),
  collapse: document.querySelector(selectors.collapse),
  menu: document.querySelector(selectors.menu),
  items: document.querySelectorAll(selectors.items),
  logo: document.querySelector(selectors.logo)
};

const root = {
  height: elements.root.offsetHeight,
  class: {
    display: "vh-100 align-items-start bg-color-2-opacity-90",
    animate: "animated fadeInDown fast",
    color: {
      default: "bg-transparent",
      changed: "bg-color-2-opacity-70"
    },
    position: {
      fixed: "fixed-top",
      default: "absolute-top"
    }
  }
};

const menu = {
  class: {
    display: "align-items-end ml-auto display-2 animated fadeInLeft"
  },

  items: {
    class: {
      animate: "animated fadeInLeft"
    }
  }
};

const collapse = {
  class: {
    display: "d-flex"
  }
};

const toggler = {
  icons: {
    class: {
      open: "fas fa-bars",
      close: "fas fa-times"
    }
  }
};

const logo = {
  fontSize: {
    default: elements.logo.style.fontSize,
    expanded: "1.5rem"
  }
};

////////////////////////////////////////////////////////////////////////////////
// exports
////////////////////////////////////////////////////////////////////////////////

/**
 *
 */
export const height = root.height;
export const element = elements.root;

/**
 *
 */
export const state = {
  open: false,
  color: {
    changed: false,
    threshold: false
  },
  fixed: {
    set: false,
    threshold: false
  }
};

/**
 *
 */
export function toggleToggler(toggle) {
  const classList = elements.togglerIcon.classList;
  const classes = toggler.icons.class;

  if ("close" === toggle) {
    classList.remove(...classes.open.split(" "));
    classList.add(...classes.close.split(" "));
  } else if ("open" === toggle) {
    classList.remove(...classes.close.split(" "));
    classList.add(...classes.open.split(" "));
  }

  return this;
}

/**
 *
 */
export function showNavItems() {
  elements.root.classList.add(...root.class.display.split(" "));
  elements.collapse.classList.add(...collapse.class.display.split(" "));
  elements.menu.classList.add(...menu.class.display.split(" "));

  elements.logo.style.fontSize = logo.fontSize.expanded;
  elements.root.style.overflowY = "auto";

  return this;
}

/**
 *
 */
export function hideNavItems() {
  elements.root.classList.remove(...root.class.display.split(" "));
  elements.collapse.classList.remove(...collapse.class.display.split(" "));
  elements.menu.classList.remove(...menu.class.display.split(" "));

  elements.logo.style.fontSize = logo.fontSize.default;
  elements.root.style.overflowY = "initial";

  return this;
}

/**
 *
 */
export function animateNavItems(animate = true) {
  if (!animate) {
    Array.from(elements.items).forEach(item => {
      item.style.animationDuration = "initial";
      item.classlist.remove(...menu.items.class.animate.split(" "));
    });

    return this;
  }

  let i = 0.5;

  Array.from(elements.items)
    .reverse()
    .forEach(item => {
      i = i * 1.2;

      item.style.animationDuration = `${i}s`;
      item.classList.add(...menu.items.class.animate.split(" "));
    });

  return this;
}

/**
 *
 */
export function toggleColor() {
  elements.root.classList.toggle(root.class.color.default);
  elements.root.classList.toggle(root.class.color.changed);

  return this;
}

/**
 *
 */
export function changeColor() {
  elements.root.classList.remove(root.class.color.default);
  elements.root.classList.add(root.class.color.changed);

  return this;
}

/**
 *
 */
export function resetColor() {
  elements.root.classList.add(root.class.color.default);
  elements.root.classList.remove(root.class.color.changed);

  return this;
}

/**
 *
 */
export function fixPosition() {
  const position = root.class.position;

  elements.root.classList.add(...root.class.animate.split(" "));
  elements.root.classList.replace(position.default, position.fixed);

  return this;
}

/**
 *
 */
export function releasePosition() {
  const position = root.class.position;

  elements.root.classList.remove(...root.class.animate.split(" "));
  elements.root.classList.replace(position.fixed, position.default);

  return this;
}

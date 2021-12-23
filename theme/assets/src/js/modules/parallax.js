import Rellax from 'rellax';

/**
 *
 */
const rellaxers = {
  frontPage: [{
    // hero background
    element: elements.frontPage.headerBackground,
    speed: -8
  }, {
    // hero logo
    element: elements.frontPage.headerLogo,
    speed: 3
  }]
};

/**
 * parallax scrolling
 */
export function initParallax() {
  const selector = 'rellax';
  const base = 'data-rellax-';
  const options = ['speed', 'percentage', 'zindex'];

  var rellax = rellaxers.frontPage;

  rellax.forEach(rellaxer => {
    const element = rellaxer.element;

    element.classList.add(selector);

    options.forEach(option => {
      if (rellaxer.hasOwnProperty(option)) {
        element.setAttribute(base + option, rellaxer[option]);
      }
    });
  });

  rellax = new Rellax(`.${selector}`, {
    round: false
  });
}

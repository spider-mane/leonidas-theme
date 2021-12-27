import Masonry from 'masonry-layout';

/**
 * stuffs
 */
import {
  elements,
} from "../config/nodes";

/**
 * masonry
 */
export function initMasonry(instance) {
  new Masonry(elements.frontPage.gallery, {
    itemSelector: '[class^=gallery__item-]',
    columnWidth: '.cornerstone',
    percentPosition: true,
  });
}

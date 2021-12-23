import { elements } from "../views/base";

const selectors = {
  root: "#header"
};

const elements = {
  root: document.querySelector(selectors.header.root)
};

const header = elements.header;
const height = header.root.offsetHeight;
const top = header.root.offsetTop;
const bottom = top + height;

////////////////////////////////////////////////////////////////////////////////
// exports
////////////////////////////////////////////////////////////////////////////////

export const state = {
  height: height,
  top: top,
  bottom: bottom
};

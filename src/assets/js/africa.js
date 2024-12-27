const countries = document.querySelectorAll("path");
const svg = document.querySelector("svg");
const initialViewBox = svg.getAttribute("viewBox");
const cleanViewBox = ({ x, y, width, height }) => {
  return [x, y, width, height].map((v) => parseInt(v, 10)).join(" ");
};

svg.addEventListener("click", function ({ target }) {
  // if target is a path in the SVG Document
  if (target.nodeName === "path") {
    // remove class on active element
    let activeElement = document.querySelector(".selected");
    if (activeElement) {
      activeElement.classList.remove("selected");
    }
    // adding the class on the clicked path;
    target.classList.add("selected");
    // Get the name of the country and get back to the viewBox initial value
    countryName(target, 2400);
  }
});

function countryName(path, time = 2000) {
  let name = path.getAttribute("data-name"),
    code = path.id,
    toast = document.createElement("div");

  toast.classList.add("toast");
  toast.textContent = `${name || "N/A"} (${code})`;
  document.body.appendChild(toast);

  setTimeout(() => {
    toast.classList.add("leave");
    toast.addEventListener("animationend", ({ target }) => {
      target.parentNode.removeChild(target);
      let activeElement = document.querySelector(".selected");
      if (activeElement) {
        activeElement.classList.remove("selected");
      }
    });
  }, time);
}

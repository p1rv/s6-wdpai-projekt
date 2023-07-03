const slider = document.querySelector(".inner-slider");

const sliderInterval = setInterval(() => {
  const current = slider.getAttribute("style") || "";
  let currentPerc = parseInt(current.slice(current.indexOf("(") + 1, current.indexOf("%")) || 0);
  currentPerc -= 100;

  slider.setAttribute("style", `transition: all 0.5s; transform: translateX(${currentPerc}%)`);
  setTimeout(() => {
    if (currentPerc == -300) {
      slider.setAttribute("style", `transition: none;`);
      slider.setAttribute("style", `transition: none; transform: translateX(0%)`);
      return;
    }
  }, 500);
}, 3000);

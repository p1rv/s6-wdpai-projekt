const slider = () => {
  const rootSlider = document.querySelector(".slider");
  const rootWidth = rootSlider.getBoundingClientRect().width;
  const slider = document.querySelector(".inner-slider");
  const increment = 100 / slider.children.length;

  [...slider.children].forEach((img) => (img.style.width = `${rootWidth}px`));

  const sliderInterval = setInterval(() => {
    const current = slider.getAttribute("style") || "";
    let currentPerc = parseInt(current.slice(current.indexOf("(") + 1, current.indexOf("%")) || 0);
    currentPerc -= increment;

    slider.setAttribute("style", `transition: all 0.5s; transform: translateX(${currentPerc}%)`);
    setTimeout(() => {
      if (currentPerc == -75) {
        slider.setAttribute("style", `transition: none;`);
        slider.setAttribute("style", `transition: none; transform: translateX(0%)`);
        return;
      }
    }, 500);
  }, 3000);

  return () => {
    clearInterval(sliderInterval);
  };
};

let sliderCleanup = slider();

const refresh = () => {
  sliderCleanup();
  sliderCleanup = slider();
};

window.addEventListener("resize", refresh);

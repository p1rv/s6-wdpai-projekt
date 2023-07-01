// (async () => {
//   const res = await fetch("/cars");
//   const json = await res.json();
//   renderCars(json);
// })();

const handleRent = async (carId) => {
  const today = new Date().toISOString().split("T")[0];
  const max = new Date();
  max.setDate(max.getDate() + 7);
  const startDate = document.querySelector('input[name="rent-start"]').value;
  const endDate = document.querySelector('input[name="rent-end"]').value;

  if (startDate > endDate || !startDate || !endDate || startDate <= today) {
    alert("Niepoprawny zakres dat");
    return;
  }

  if (startDate > max) {
    alert("Maksymalna data wypożyczenia to 7 dni od dzisiaj.");
    return;
  }

  const body = { carId, startDate, endDate };

  const res = await fetch("/apiRent", {
    method: "POST",
    body: JSON.stringify(body),
    headers: {
      "Content-Type": "application/json",
    },
  });

  if (res.ok) {
    alert("Wypożyczyłeś samochód");
    window.location.replace("/rent");
  } else {
    alert("Błąd w trakcie procesu wypożyczania");
  }
};

// const createCarElement = (type, attrs, text) => {
//   const element = document.createElement(type);
//   attrs.forEach((attr) => element.setAttribute(attr[0], attr[1]));
//   element.innerText = text ? text : null;
//   return element;
// };

// const renderCar = (car) => {
//   const carContainer = createCarElement("div", [["class", "car-container"]]);

//   carContainer.appendChild(
//     createCarElement("img", [
//       ["class", "car-img"],
//       ["src", car.image],
//       ["alt", car.make],
//     ])
//   );
//   const descriptionContainer = createCarElement("div", [["class", "description-wrapper"]]);
//   const descriptionLeft = createCarElement("div", [["class", "description-left"]]);
//   const carName = createCarElement("div", [["class", "car-row"]]);
//   carName.appendChild(createCarElement("div", [["class", "make"]], car.make));
//   carName.appendChild(createCarElement("div", [["class", "model"]], car.model));
//   descriptionLeft.appendChild(carName);
//   const carStats = createCarElement("div", [["class", "car-row"]]);
//   carStats.appendChild(createCarElement("div", [["class", "color"]], car.color));
//   carStats.appendChild(createCarElement("div", [["class", "year"]], car.year));
//   descriptionLeft.appendChild(carStats);

//   descriptionContainer.appendChild(descriptionLeft);

//   const rentButton = createCarElement("button", [["class", "btn rent-btn"]], "WYPOŻYCZ");
//   rentButton.onclick = () => handleRent(car.id);
//   descriptionContainer.appendChild(rentButton);

//   carContainer.appendChild(descriptionContainer);

//   return carContainer;
// };

// const renderCars = (carsList) => {
//   carsList.map((car) => renderCar(car)).forEach((car) => document.querySelector(".cars").appendChild(car));
// };

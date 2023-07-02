[...document.querySelectorAll(".car-input input")].forEach((input) => {
  input.addEventListener("input", (e) => {
    e.target.parentNode.querySelector("label").setAttribute("class", e.target.value && "filled");
  });
});

const handleCarUpdate = async (id) => {
  const newImg = document.querySelector(`input[name='${id}-update-image'`).value;
  const newPpd = document.querySelector(`input[name='${id}-update-ppd'`).valueAsNumber;
  const res = await fetch("apiUpdateCar", {
    method: "POST",
    body: JSON.stringify({ id, newImg, newPpd }),
    headers: {
      "Content-Type": "application/json",
    },
  });
  if (!res.ok) {
    alert("Błąd po stronie serwera");
    return;
  }
  alert("Zmieniono statystyki samochodu");
  window.location.replace("/manageCars");
};
const handleCarDelete = async (id) => {
  const res = await fetch("apiDeleteCar", {
    method: "POST",
    body: JSON.stringify({ id }),
    headers: {
      "Content-Type": "application/json",
    },
  });
  if (!res.ok) {
    alert("Błąd po stronie serwera");
    return;
  }
  alert("Usunięto samochód");
  window.location.replace("/manageCars");
};

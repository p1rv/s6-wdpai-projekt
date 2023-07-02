[...document.querySelectorAll(".repair-input input")].forEach((input) => {
  input.addEventListener("input", (e) => {
    e.target.parentNode.querySelector("label").setAttribute("class", e.target.value && "filled");
  });
});

const handleRepairUpdate = async (id, clientId) => {
  const price = document.querySelector(`input[name='${id}-update-price']`).valueAsNumber;
  const status = parseInt(document.querySelector(`select[name='${id}-update-status']`).value);
  const end_date = document.querySelector(`input[name='${id}-update-date']`).value;

  if (end_date < new Date().toISOString().split("T")[0]) {
    alert("Wprowadź poprawną datę");
    return;
  }

  const res = await fetch("apiUpdateRepair", {
    method: "POST",
    body: JSON.stringify({ id, price, status, end_date, client_id: clientId }),
    headers: {
      "Content-Type": "application/json",
    },
  });

  if (res.ok) {
    alert("Zaktualizowałeś dane naprawy");
    window.location.replace("/manageRepairs");
  } else {
    alert("Błąd w trakcie procesu aktualizacji");
  }
};

const handleRepairDelete = async (id) => {
  const res = await fetch("apiDeleteRepair", {
    method: "POST",
    body: JSON.stringify({ id }),
    headers: {
      "Content-Type": "application/json",
    },
  });

  if (res.ok) {
    alert("Usunąłeś naprawę");
    window.location.replace("/manageRepairs");
  } else {
    alert("Błąd w trakcie procesu usuwania");
  }
};

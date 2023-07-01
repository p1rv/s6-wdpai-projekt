const handleReturn = async (rentalId, userId, carId) => {
  const today = new Date().toISOString().split("T")[0];
  const price = document.getElementById(`${rentalId}-rental`).valueAsNumber;

  const body = { rentalId, price, userId, carId };

  const res = await fetch("/apiReturn", {
    method: "POST",
    body: JSON.stringify(body),
    headers: {
      "Content-Type": "application/json",
    },
  });

  if (res.ok) {
    alert("Samochód został poprawnie zwrócony");
    window.location.replace("/rent");
  } else {
    alert("Błąd w trakcie procesu zwracania");
  }
};

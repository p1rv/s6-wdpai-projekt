const handleUserRoleChange = async (e, id) => {
  const res = await fetch("/apiChangeUserRole", {
    method: "POST",
    body: JSON.stringify({ id, role: parseInt(e.target.value) }),
    headers: {
      "Content-Type": "application/json",
    },
  });
  if (!res.ok) {
    alert("Błąd po stronie serwera");
    return;
  }
  alert("Zmieniono rolę użytkownika");
  window.location.replace("/users");
};

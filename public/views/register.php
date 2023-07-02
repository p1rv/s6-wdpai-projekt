<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/style.css" />
  <link rel="stylesheet" href="public/css/login.css" />
  <title>Rejestracja</title>
</head>

<body>
  <div class="root">
    <div class="bg">
      <div class="bg-img"></div>
      <div class="bg-blur"></div>
      <div class="bg-color"></div>
    </div>
    <div class="container">
      <div class="logo">
        <a class="temp-logo" href="/">TotalCarService</a>
      </div>
      <div class="login-wrapper">
        <div class="message">
          <?php if (isset($messages)) {
            foreach ($messages as $message) {
              echo $message;
            }
          }
          ?>
        </div>
        <form class="login-form register-form" action="apiRegister" method="POST">
          <label class="login-input">
            <input required type="email" name="login" />
            <label>E-mail</label>
          </label>
          <label class="login-input">
            <input required type="text" name="name" />
            <label>Imię</label>
          </label>
          <label class="login-input">
            <input required type="text" name="surname" />
            <label>Nazwisko</label>
          </label>
          <label class="login-input">
            <input required type="text" name="phone" />
            <label>Numer telefonu</label>
          </label>
          <label class="login-input">
            <input required type="text" name="city" />
            <label>Miasto</label>
          </label>
          <label class="login-input">
            <input required type="text" name="street" />
            <label>Ulica</label>
          </label>
          <label class="login-input">
            <input required type="text" name="house_no" />
            <label>Numer domu</label>
          </label>
          <label class="login-input">
            <input required type="text" name="flat_no" />
            <label>Numer mieszkania</label>
          </label>
          <label class="login-input">
            <input required type="text" name="postal_code" />
            <label>Kod pocztowy</label>
          </label>
          <label class="login-input">
            <input required type="text" name="pesel" />
            <label>PESEL</label>
          </label>
          <label class="login-input">
            <input required class="login-input" type="password" name="password" />
            <img class="show-password" src="public/svg/eyeoff.svg" alt="view" onClick="showPassword('password')" />
            <label>Hasło</label>
          </label>
          <label class="login-input">
            <input required class="login-input" type="password" name="password-rep" />
            <img class="show-password" src="public/svg/eyeoff.svg" alt="view" onClick="showPassword('password-rep')" />
            <label>Powtórz hasło</label>
          </label>

          <button class="btn" type="submit">
            ZAREJESTRUJ SIĘ
          </button>
        </form>
        <p class="register-q">Masz już konto?</p>
        <a class="btn" href="login">
          ZALOGUJ SIĘ
        </a>
      </div>
    </div>
  </div>
  <script>
    [...document.querySelectorAll(".login-input input")].forEach((input) => {
      input.addEventListener("input", (e) => {
        e.target.parentNode.querySelector("label").setAttribute("class", e.target.value && "filled")
      })
    })
    const showPassword = (inputName) => {
      const passwordRef = document.querySelector(`.login-input[name=${inputName}]`);
      console.log(passwordRef.getBoundingClientRect())
      passwordRef.setAttribute("type", passwordRef.type === "password" ? "text" : "password")
    }
    const passwordInput = document.querySelector(".login-input[name='password']");
  </script>
</body>

</html>
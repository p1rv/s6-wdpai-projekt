<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <link
      rel="stylesheet"
      href="public/css/style.css"
    />
    <link
      rel="stylesheet"
      href="public/css/login.css"
    />
    <title>Login</title>
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
          <?php if(isset($messages)){
            foreach($messages as $message){
              echo $message;
            }
          }
          ?>
        </div>
          <form class="login-form" action="apiLogin" method="POST">
            <label
            class="login-input">
              <input
                type="email"
                name="login"
              />
              <label>E-mail</label>
            </label>
            <label
            class="login-input">
              <input
                class="login-input"
                type="password"
                name="password"
              />
              <img class="show-password" src="public/svg/eyeoff.svg" alt="view" onClick="showPassword('password')"/>
              <label>Hasło</label>
            </label>
            <button
              class="btn"
              type="submit"
              >ZALOGUJ SIĘ
            </button>
          </form>
          <p class="register-q">Nie masz konta?</p>
          <a
          class="btn" href="register"
          >
            ZAREJESTRUJ SIĘ
        </a>
        </div>
      </div>
    </div>
    <script>
      [...document.querySelectorAll(".login-input input")].forEach((input) => {input.addEventListener("input", (e) => {
        e.target.parentNode.querySelector("label").setAttribute("class", e.target.value && "filled")
      })})
      const showPassword = (inputName) => {
        const passwordRef = document.querySelector(`.login-input[name=${inputName}]`);
        console.log(passwordRef.getBoundingClientRect())
        passwordRef.setAttribute("type", passwordRef.type === "password" ? "text" : "password")
      }
      const passwordInput = document.querySelector(".login-input[name='password']");
      
    </script>
  </body>
</html>

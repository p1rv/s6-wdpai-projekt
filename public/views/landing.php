<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/style.css" />
  <link rel="stylesheet" href="public/css/landing.css" />
  <title>TotalCarService</title>
</head>

<body>
  <div class="root">
    <div class="bg">
      <div class="bg-img"></div>
      <div class="bg-blur"></div>
    </div>
    <div class="container">
      <?php if (isset($messages)) : ?>
        <div class="message">
          <?php foreach ($messages as $message) {
            echo $message;
          }
          ?>
        </div>
      <?php endif ?>
      <?php include('public/components/header.php') ?>
      <div class="slider">
        <div class="slider-wrapper">
          <div class="inner-slider">
            <img src="public/img/kia.png" alt="Kia Xceed" />
            <img src="public/img/tucson.png" alt="Hyundai Tucson" />
            <img src="public/img/rs6.png" alt="Audi RS6" />
            <img src="public/img/kia.png" alt="Kia Xceed" />
          </div>
        </div>
      </div>
      <div class="info-bar">
        <div>Działamy 24h na dobę!</div>
        <div>Zadzwoń do nas!</div>
        <div>Numer Telefonu: 835 924 368</div>
      </div>
      <div class="offers">
        <div class="offer">
          <p class="offer-title">HOLOWANIE</p>
          <p class="offer-description">
            Uczestniczyłeś w wypadku drogowym? Samochód nie jest w stanie jechać dalej? Skontaktuj się z nami! Oferujemy
            niemal natychmiastową usługę holowania pod wskazany adres lub do naszego warsztatu.
          </p>
          <button class="btn offer-btn">
            <p class="offer-btn-text">Sprawdź</p>
            <img src="public/svg/arrow-right.svg" alt="arrow pointing right" />
          </button>
        </div>
        <div class="offer">
          <p class="offer-title">WYPOŻYCZALNIA I POJAZDY ZASTĘPCZE</p>
          <p class="offer-description">
            Oferujemy szeroką flotę aut gotowych do wypożyczenia, a także samochody zastępcze - Jeżeli Twoje auto zostało uszkodzone w
            wypadku otrzymasz pojazd tej samej klasy za darmo na czas konieczny do przywrócenia Twojego auta do stanu sprzed kolizji.
          </p>
          <a class="btn offer-btn" href="rent">
            <p class="offer-btn-text">Sprawdź</p>
            <img src="public/svg/arrow-right.svg" alt="arrow pointing right" />
          </a>
        </div>
        <div class="offer">
          <p class="offer-title">NAPRAWA</p>
          <p class="offer-description">
            Możesz zdecydować się na naprawę w naszym warsztacie - zarówno uszkodzeń w następstwie wypadku jak i innych usterek. Oferujemy
            również bezgotówkowe naprawy w całości opłacane z OC sprawcy kolizji - przez czas trwania remontu możesz korzystać z darmowego
            samochodu zastępczego.
          </p>
          <button class="btn offer-btn">
            <p class="offer-btn-text">Sprawdź</p>
            <img src="public/svg/arrow-right.svg" alt="arrow pointing right" />
          </button>
        </div>
      </div>
    </div>
  </div>
  <script src="public/js/landing.js"></script>
</body>

</html>
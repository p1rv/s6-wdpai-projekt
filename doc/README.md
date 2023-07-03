# TotalCarService

Aplikacja dla firmy zajmującej się naprawą, wypożyczaniem oraz obsługą wypadków drogowych.

- stwórz bazę danych PostgreSQL z pliku db.sql
- podłącz ją w pliku config.php:
```
<?php
const USERNAME = "";
const PASSWORD = "";
const HOST = "";
const DATABASE = "";
```
- uruchom za pomocą `docker compose up`
- ✨Magic ✨ at localhost:8080

## Features

#### Klient:
- Informacje na temat kontaktu z firmą w razie wypadku/chęci skorzystania z innych usług
- Możliwość wypożyczenia samochodów
- Możliwość wglądu w na bieżąco aktualizowane statystyki napraw i historię usług
#### Mechanik:
- Dodawanie napraw
- Aktualizowanie stanu i ceny danej naprawy, a także możliwość dodania przewidywanej daty zakończenia
- Automatyczne wystawianie faktur
#### Biuro:
- Zatwierdzanie zwrotów samochodów z możliwością aktualizacji ceny
- Dodawanie nowych samochodów
- Wystawianie faktur
#### Zarząd
- Zatwierdzanie zwróconych pojazdów wraz z możliwością zmiany ceny
- Dodawanie nowych samochodów
- Wystawianie faktur
- Wgląd w całą historię usług
- Zmiana roli (a co za tym idzie dostępu) użytkowników

## Grafiki
Zrzuty ekranu oraz diagramy ERD dostępne są w folderze /docs (prawdopodobnie już w nim jesteś czytając ten plik)

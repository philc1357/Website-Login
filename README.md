# PHP Login & Registrierung (Lernprojekt)

Dieses Projekt ist ein **lokales Lernprojekt**, um die Grundlagen von  
**PHP**, **MySQL/MariaDB**, **HTML/CSS** und **Web-Authentifizierung** zu verstehen.

Der Fokus liegt auf:
- Verstehen, **wie Login- und Registrierungssysteme funktionieren**
- Nachvollziehen von **SQL-Abfragen**
- Bewusstem Arbeiten mit **unsicherem Code**, um spätere Angriffe (z. B. SQL Injection) zu verstehen

> **WICHTIG:**  
> Dieses Projekt ist **absichtlich nicht sicher** und **nicht für den Produktiveinsatz gedacht**.

---

## **Features**

- Login-Seite
- Registrierungs-Seite
- MySQL/MariaDB-Datenbank
- Prüfung auf vorhandene Benutzer / E-Mail
- Einfaches Frontend mit HTML & CSS
- PHP Built-in Server (`php -S localhost:8000`)

---

## **Verwendete Technologien**

- PHP (mysqli)
- MySQL / MariaDB
- HTML5
- CSS3 (Flexbox)
- Lokaler PHP Built-in Server

---

## 🗂 Projektstruktur
.
├── index.html # Login-Seite
├── login.php # Login-Logik
├── register.html # Registrierungsformular
├── register_submit.php # Registrierungs-Logik
├── success.php # Erfolgsseite
├── error.php # Fehlerseite
├── style.css # Styling
└── README.md

---

## Datenbankstruktur

```sql
CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  vorname VARCHAR(50),
  nachname VARCHAR(50),
  username VARCHAR(50),
  passwort VARCHAR(50),
  email VARCHAR(100)
);


▶️ Projekt lokal starten
Repository klonen

In das Projektverzeichnis wechseln

PHP-Server starten:
php -S localhost:8000

Im Browser öffnen:
http://localhost:8000/index.html


🔐 Sicherheit (bewusst unsicher)
Dieses Projekt verwendet keine:

Passwort-Hashing (password_hash)

Prepared Statements

Sessions

CSRF-Schutz

👉 Absicht:
Das Projekt dient dazu, klassische Sicherheitsprobleme zu erkennen, zu verstehen und später gezielt abzusichern oder anzugreifen.

🎯 Lernziele
Verständnis für Login-/Registrierungslogik

Umgang mit SQL (SELECT, INSERT, UPDATE)

Trennung von Frontend & Backend

Typische Fehlerquellen erkennen

Vorbereitung auf Web-Security & Pentesting

Rollen / Berechtigungen

📜 Hinweis
Dieses Projekt ist ein privates Lernprojekt
und erhebt keinen Anspruch auf Sicherheit oder Vollständigkeit.

🧠 Build to understand. Break to learn.

# TravelMate

## Overview

TravelMate is a web application. It allows users to search for country information and current weather conditions, add personal notes and planned visit dates, and save these travel plans to a local database. Users can later view, update, or delete their saved travels. The app integrates multiple open APIs and demonstrates AJAX, PHP scripting, MySQL database usage, and basic UI/UX design.

---

## APIs Used

- **REST Countries API**  
  Provides detailed information about countries, including country name, capital, and flag images.  
  API Endpoint: `https://restcountries.com/v3.1/name/{country}`

- **Open-Meteo API**  
  Provides current weather data based on geographic coordinates (latitude and longitude).  
  API Endpoint: `https://api.open-meteo.com/v1/forecast?latitude={lat}&longitude={lon}&current_weather=true`

---

## Setup Instructions

### Prerequisites

- A local web server environment supporting PHP and MySQL (e.g., XAMPP, WAMP, Laragon)
- Internet connection to access the external APIs

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/sealabVertical/travelmate.git
   ```

async function searchCountry() {
  const country = document.getElementById("countryInput").value.trim();
  const resultsDiv = document.getElementById("results");
  resultsDiv.innerHTML = "";

  if (!country) {
    resultsDiv.innerHTML = "<p>Please enter a country name.</p>";
    return;
  }

  try {
    const countryRes = await fetch(`https://restcountries.com/v3.1/name/${country}`);
    const countryData = await countryRes.json();
    const info = countryData[0];

    const capital = info.capital[0];
    const lat = info.capitalInfo.latlng[0];
    const lon = info.capitalInfo.latlng[1];
    const flagUrl = info.flags.png;

    const weatherRes = await fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true`);
    const weatherData = await weatherRes.json();
    const weather = weatherData.current_weather.temperature + "°C";

    resultsDiv.innerHTML = `
      <img src="${flagUrl}" alt="Flag of ${info.name.common}" width="100"><br>
      <h3>Country: ${info.name.common}</h3>
      <p>Capital: ${capital}</p>
      <p>Current Weather: ${weather}</p>

      <label for="notes">Notes:</label><br>
      <textarea id="notes" rows="3" cols="30"></textarea><br>

      <label for="visitTime">Planned Visit Date:</label><br>
      <input type="date" id="visitTime"><br><br>

      <button onclick="saveTravel('${info.name.common}', '${capital}', '${weather}')">Save Travel</button>
    `;
  } catch (err) {
    resultsDiv.innerHTML = "<p>Error retrieving data. Please check the country name.</p>";
    console.error(err);
  }
}


function saveTravel(country, capital, weather) {
  const notes = document.getElementById("notes").value;
  const visitTime = document.getElementById("visitTime").value;

  if (!visitTime) {
    alert("Please select a visit date.");
    return;
  }

  const formData = new FormData();
  formData.append("country", country);
  formData.append("capital", capital);
  formData.append("weather", weather);
  formData.append("notes", notes);
  formData.append("visit_time", visitTime);

  fetch("php/save_travel.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    alert("Travel saved!");
  })
  .catch(err => {
    alert("Error saving travel.");
    console.error(err);
  });
}

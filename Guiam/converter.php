<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Temperature Converter - Beautiful Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Gradient background */
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
    }

    /* Glass card */
    .converter-card {
      max-width: 450px;
      width: 100%;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border-radius: 20px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      padding: 40px 30px;
      border: 1px solid rgba(255, 255, 255, 0.18);
      transition: box-shadow 0.3s ease;
    }
    .converter-card:hover {
      box-shadow: 0 12px 48px 0 rgba(31, 38, 135, 0.6);
    }

    h3 {
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
      letter-spacing: 1.1px;
      text-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }

    label {
      font-weight: 600;
      font-size: 1rem;
      color: #e2e2e2;
    }

    input.form-control, select.form-select {
      border-radius: 12px;
      padding: 12px 15px;
      border: none;
      background: rgba(255,255,255,0.15);
      color: #fff;
      box-shadow: inset 0 2px 5px rgba(0,0,0,0.15);
      transition: background 0.3s ease, box-shadow 0.3s ease;
    }
    input.form-control:focus, select.form-select:focus {
      background: rgba(255,255,255,0.3);
      box-shadow: 0 0 8px rgba(102, 126, 234, 0.8);
      color: #222;
      outline: none;
    }

    button.btn-primary {
      border-radius: 25px;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 12px 0;
      background: linear-gradient(45deg, #667eea, #764ba2);
      border: none;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.6);
      transition: background 0.4s ease, box-shadow 0.4s ease;
    }
    button.btn-primary:hover {
      background: linear-gradient(45deg, #764ba2, #667eea);
      box-shadow: 0 6px 25px rgba(118, 75, 162, 0.8);
    }

    /* Result styling with fade in */
    .result {
      font-weight: 700;
      font-size: 1.4rem;
      margin-top: 25px;
      color: #f3f4f6;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 12px;
      opacity: 0;
      animation: fadeInUp 0.8s forwards;
    }

    /* Icon color */
    .result svg {
      fill: #7f83ff;
      width: 28px;
      height: 28px;
    }

    /* Alert overrides for error */
    .alert-danger {
      background: rgba(255, 0, 0, 0.15);
      color: #f8d7da;
      border: none;
      font-weight: 600;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 0 8px rgba(255, 0, 0, 0.3);
    }

    /* Animations */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 480px) {
      .converter-card {
        padding: 30px 20px;
      }
      .result {
        font-size: 1.2rem;
        gap: 8px;
      }
      button.btn-primary {
        font-size: 1rem;
        padding: 10px 0;
      }
    }
  </style>
</head>
<body>

<div class="converter-card">
  <h3>Temperature Converter</h3>

  <form id="tempForm">
    <div class="mb-4">
      <label for="temp_input">Enter Temperature</label>
      <input
        type="text"
        id="temp_input"
        name="temp_input"
        class="form-control"
        placeholder="e.g. 25"
        required
        autocomplete="off"
      />
    </div>

    <div class="mb-4">
      <label for="conversion">Conversion Type</label>
      <select name="conversion" id="conversion" class="form-select" required>
        <option value="c-to-f" selected>Celsius to Fahrenheit</option>
        <option value="f-to-c">Fahrenheit to Celsius</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary w-100">Convert</button>
  </form>

  <div id="message" class="mt-4"></div>
</div>

<script>
document.getElementById('tempForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const tempInput = document.getElementById('temp_input').value.trim();
    const conversion = document.getElementById('conversion').value;
    const messageDiv = document.getElementById('message');

    messageDiv.innerHTML = '<div class="text-center text-white-50">Converting...</div>';

    try {
        const response = await fetch('api.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({temp_input: tempInput, conversion: conversion})
        });

        const data = await response.json();

        if (data.error) {
            messageDiv.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
        } else {
            messageDiv.innerHTML = `
                <div class="result">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="bi bi-thermometer-half" fill="currentColor" aria-hidden="true" focusable="false">
                    <path d="M8 14a2 2 0 0 0 1-3.732V5a1 1 0 1 0-2 0v5.268A2 2 0 0 0 8 14z"/>
                    <path d="M8 0a3 3 0 0 0-3 3v7.268a3 3 0 1 0 6 0V3a3 3 0 0 0-3-3zM7 3a1 1 0 1 1 2 0v7.268a1 1 0 1 1-2 0V3z"/>
                  </svg>
                  ${data.result}
                </div>`;
        }
    } catch (err) {
        messageDiv.innerHTML = `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

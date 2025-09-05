<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Welcome - Temperature Converter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
      margin: 0;
      padding: 20px;
      text-align: center;
    }
    .welcome-container {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 40px 30px;
      max-width: 400px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border: 1px solid rgba(255, 255, 255, 0.18);
    }
    h1 {
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }
    p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      color: #e2e2e2;
    }
    a.btn-primary {
      border-radius: 25px;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 12px 40px;
      background: linear-gradient(45deg, #667eea, #764ba2);
      border: none;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.6);
      text-decoration: none;
      color: white;
      display: inline-block;
      transition: background 0.4s ease, box-shadow 0.4s ease;
    }
    a.btn-primary:hover {
      background: linear-gradient(45deg, #764ba2, #667eea);
      box-shadow: 0 6px 25px rgba(118, 75, 162, 0.8);
    }
  </style>
</head>
<body>
  <div class="welcome-container">
    <h1>Welcome!</h1>
    <p>Use our beautiful temperature converter to switch between Celsius and Fahrenheit.</p>
    <a href="converter.php" class="btn btn-primary" role="button">Start Converting</a>
  </div>
</body>
</html>

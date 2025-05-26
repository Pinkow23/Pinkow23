<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update Student | BSIT</title>

  <!-- Google Fonts: Montserrat + Cinzel -->
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #e6e6fa;
      color: #2f4f4f;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    .header {
      position: sticky;
      top: 0;
      background-color: #663399;
      padding: 15px 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .surnames {
      font-family: 'Montserrat', sans-serif;
      color: #ffd700;
      font-weight: 700;
      font-size: 1.25rem;
      letter-spacing: 1px;
    }

    .nav-links {
      display: flex;
      gap: 30px;
    }

    .nav-links a {
      color: #ffd700;
      font-weight: 600;
      font-size: 1.1rem;
      padding-bottom: 3px;
      border-bottom: 2px solid transparent;
      transition: all 0.3s ease;
    }

    .nav-links a:hover {
      border-bottom-color: #ffd700;
    }

    .wrapper {
      max-width: 600px;
      margin: 80px auto 40px auto;
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(102, 51, 153, 0.1);
    }

    .wrapper h1 {
      font-family: 'Cinzel', serif;
      font-size: 2.5rem;
      margin-bottom: 2rem;
      text-align: center;
      color: #663399;
      font-weight: 700;
      letter-spacing: 2px;
    }

    form table {
      width: 100%;
      border-collapse: collapse;
      box-shadow: 0 4px 12px rgba(102, 51, 153, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    form th, form td {
      padding: 15px;
      border-bottom: 1px solid #ddd;
      font-weight: 600;
      color: #2f4f4f;
      text-align: left;
      vertical-align: middle;
      font-size: 1.1rem;
      background-color: #f9f5ff;
    }

    form th {
      background-color: #663399;
      color: #ffd700;
      font-weight: 700;
      white-space: nowrap;
    }

    form tr:last-child td {
      border-bottom: none;
      background-color: transparent;
      text-align: center;
      padding-top: 25px;
    }

    select, input[type="text"], input[type="number"] {
      width: 95%;
      max-width: 300px;
      padding: 10px;
      border: 2px solid #663399;
      border-radius: 5px;
      font-size: 1rem;
      outline: none;
      transition: border-color 0.3s;
    }

    select:focus, input:focus {
      border-color: #ffd700;
    }

    .btn {
      padding: 10px 30px;
      font-size: 16px;
      border: 2px solid #663399;
      border-radius: 5px;
      background-color: transparent;
      color: #663399;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s, color 0.3s;
      display: inline-block;
      text-align: center;
      min-width: 120px;
    }

    .btn:hover {
      background-color: #663399;
      color: #ffd700;
    }

    #a {
      margin-top: 20px;
      padding: 15px;
      background: #f9f5ff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(102, 51, 153, 0.1);
    }

    .footer {
      background-color: #663399;
      color: #ffd700;
      text-align: center;
      padding: 20px 0;
      font-family: 'Cinzel', serif;
      margin-top: 40px;
    }

    .footer p {
      margin: 0;
      font-size: 0.9rem;
      font-family: 'Montserrat', sans-serif;
    }

    @media (max-width: 480px) {
      .wrapper {
        margin: 80px 20px 40px 20px;
      }

      form table, form th, form td {
        font-size: 1rem;
      }

      select, input[type="text"], input[type="number"] {
        width: 100%;
      }

      .btn {
        min-width: 100px;
        padding: 10px 10px;
      }
    }
  </style>

  <script>
    function showData(name) {
      if (!name) {
        document.getElementById('a').innerHTML = '';
        return;
      }
      fetch(`getinfo.php?q=${encodeURIComponent(name)}`)
        .then(r => r.text())
        .then(html => document.getElementById('a').innerHTML = html);
    }
  </script>

</head>
<body>

  <!-- Header Section -->
  <header class="header">
    <div class="surnames">Peñalosa - Camacho</div>
    <nav class="nav-links">
      <a href="index.php">Home</a>
      <a href="aboutus.html">About Us</a>
    </nav>
  </header>

  <div class="wrapper">
    <h1>Search & Update Student</h1>

    <form>
      <table>
        <tr>
          <th><label for="selectors">Select Name</label></th>
          <td>
            <select id="selectors" onchange="showData(this.value)">
              <option value="">-- Choose --</option>
              <?php
                $xml = simplexml_load_file('cict.xml');
                foreach ($xml->student as $stud) {
                  $n = htmlspecialchars($stud->name);
                  echo "<option value=\"$n\">$n</option>";
                }
              ?>
            </select>
          </td>
        </tr>
      </table>
    </form>

    <div id="a"><!-- Fetched info & update form from getinfo.php will appear here --></div>
  </div>

  <footer class="footer">
    <p>&copy; Final project for IT 310. All rights reserved.</p>
  </footer>

</body>
</html>

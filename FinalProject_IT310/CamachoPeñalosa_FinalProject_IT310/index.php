<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home | BSIT</title>

  <!-- Google Fonts: Montserrat + Cinzel -->
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    /* Reset and Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #e6e6fa; /* Lavender */
      color: #2f4f4f; /* Dark Slate Gray */
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Header Styles */
    .header {
      position: sticky;
      top: 0;
      background-color: #663399; /* Royal Purple */
      padding: 15px 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-family: 'Montserrat', sans-serif;
      color: #ffd700; /* Golden Yellow */
      font-weight: 700;
      font-size: 1.25rem;
      letter-spacing: 1px;
    }

    .header .surnames {
      font-family: 'Montserrat', sans-serif;
      color: #ffd700;
      font-weight: 700;
    }

    .nav-links {
      display: flex;
      gap: 30px;
    }

    .nav-links a {
      color: #ffd700; /* Golden Yellow */
      font-weight: 600;
      font-size: 1.1rem;
      padding-bottom: 3px;
      border-bottom: 2px solid transparent;
      transition: all 0.3s ease;
    }

    .nav-links a:hover {
      border-bottom-color: #ffd700;
    }

    /* Main Content Styles */
    .wrapper {
      max-width: 1000px;
      margin: 80px auto 40px auto;
      padding: 0 20px;
    }

    .wrapper h1 {
      font-family: 'Cinzel', serif;
      font-size: 3rem;
      margin-bottom: 3rem;
      text-align: center;
      color: #663399;
      font-weight: 700;
      letter-spacing: 2px;
    }

    .table-container {
      margin: 20px 0;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
      box-shadow: 0 4px 12px rgba(102, 51, 153, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 15px;
      border-bottom: 1px solid #ddd;
      color: #2f4f4f;
    }

    th {
      background-color: #663399;
      color: #ffd700;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: #f9f5ff;
    }

    /* Button Styles */
    .btn-container {
      display: flex;
      justify-content: center;
      gap: 30px;
      margin-top: 30px;
    }

    .btn {
      padding: 10px 20px;
      font-size: 16px;
      border: 2px solid #663399;
      border-radius: 5px;
      background-color: transparent;
      color: #663399;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s, color 0.3s;
    }

    .btn:hover {
      background-color: #663399;
      color: #ffd700;
    }

    /* Footer Styles */
    .footer {
      background-color: #663399;
      color: #ffd700;
      text-align: center;
      padding: 20px 0;
      font-family: 'Cinzel', serif;
    }

    .footer p {
      margin: 0;
      font-size: 0.9rem;
      font-family: 'Montserrat', sans-serif;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .header {
        flex-direction: column;
        gap: 10px;
      }

      .nav-links {
        flex-direction: column;
        gap: 10px;
        align-items: center;
      }

      .wrapper h1 {
        font-size: 2.5rem;
        margin-bottom: 2rem;
      }

      .table-container {
        overflow-x: scroll;
      }

      .btn-container {
        flex-direction: column;
      }
    }
  </style>
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

  <!-- Main Content -->
  <div class="wrapper">
    <h1>Student Data</h1>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th class="header-name">ID</th>
            <th class="header-name">Name</th>
            <th class="header-name">Course</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $xml = new DOMDocument;
          $xml->load('cict.xml');
          $x = $xml->getElementsByTagName('Students')->item(0);
          $students = $x->getElementsByTagName('student');

          foreach($students as $stud) {
              $Id = $stud->getElementsByTagName('id')->item(0)->nodeValue;
              $Name = $stud->getElementsByTagName('name')->item(0)->nodeValue;
              $course = $stud->getElementsByTagName('course')->item(0)->nodeValue;
          ?>
            <tr>
              <td class="user-data"><?php echo $Id ?></td>
              <td class="user-data"><?php echo $Name ?></td>
              <td class="user-data"><?php echo $course ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="btn-container">
      <button onclick="location.href='add.php'" class="btn">ADD NEW</button>
      <button onclick="location.href='delete.php'" class="btn">DELETE</button>
      <button onclick="location.href='update.php'" class="btn">SEARCH DATA</button>
    </div>
  </div>

  <!-- Footer Section -->
  <footer class="footer">
    <p>&copy; Final project for IT 310. All rights reserved.</p>
  </footer>

</body>
</html>

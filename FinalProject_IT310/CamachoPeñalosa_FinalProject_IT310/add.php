<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add New Student | BSIT</title>

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

    /* Form styled as table */
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
      width: 30%;
    }

    form tr:last-child td {
      border-bottom: none;
      background-color: transparent;
      text-align: center;
      padding-top: 25px;
    }

    input[type="number"],
    input[type="text"] {
      width: 95%;
      padding: 10px;
      border: 2px solid #663399;
      border-radius: 5px;
      font-size: 1rem;
      outline: none;
      transition: border-color 0.3s;
    }

    input[type="number"]:focus,
    input[type="text"]:focus {
      border-color: #ffd700;
    }

    /* Buttons inside the form table */
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

    /* Message styling */
    .message {
      text-align: center;
      color: #663399;
      font-weight: 600;
      margin-bottom: 15px;
    }

    /* Footer Styles */
    .footer {
      background-color: #663399;
      color: #ffd700;
      text-align: center;
      padding: 20px 0;
      font-family: 'Cinzel', serif;
      position: fixed;
      width: 100%;
      bottom: 0;
    }

    .footer p {
      margin: 0;
      font-size: 0.9rem;
      font-family: 'Montserrat', sans-serif;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .wrapper {
        margin: 80px 20px 80px 20px;
      }

      form table, form th, form td {
        font-size: 1rem;
      }

      input[type="number"], input[type="text"] {
        width: 100%;
      }

      .btn {
        min-width: 100px;
        padding: 10px 10px;
      }
    }
  </style>
</head>
<body>

<?php
$message = '';
if (isset($_POST['submit'])) {
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $course = htmlspecialchars($_POST['course']);
    
    $xml = new DOMDocument;
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    $xml->load('cict.xml');

    $newStudent = $xml->createElement('student');
    $newStudent->appendChild($xml->createElement('id', $id));
    $newStudent->appendChild($xml->createElement('name', $name));
    $newStudent->appendChild($xml->createElement('course', $course));

    $xml->getElementsByTagName('Students')->item(0)->appendChild($newStudent);
    if ($xml->save('cict.xml')) {
        $message = "Record added successfully!";
    } else {
        $message = "Error adding record.";
    }
}
?>

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
  <h1>Add New Student</h1>

  <?php if ($message): ?>
    <p class="message"><?php echo $message; ?></p>
  <?php endif; ?>

  <form method="POST" action="">
    <table>
      <tr>
        <th><label for="id">ID</label></th>
        <td><input type="number" name="id" id="id" required /></td>
      </tr>
      <tr>
        <th><label for="name">Name</label></th>
        <td><input type="text" name="name" id="name" required /></td>
      </tr>
      <tr>
        <th><label for="course">Course</label></th>
        <td><input type="text" name="course" id="course" required /></td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="submit" name="submit" class="btn">Add</button>
          <button type="button" onclick="location.href='index.php'" class="btn">View Data</button>
        </td>
      </tr>
    </table>
  </form>
</div>

<!-- Footer Section -->
<footer class="footer">
  <p>&copy; Final project for IT 310. All rights reserved.</p>
</footer>

</body>
</html>

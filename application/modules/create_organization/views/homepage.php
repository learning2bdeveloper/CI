<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Dashboard</h1>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
      </ul>
    </nav>
    <div class="search-container">
      <form action="search.html" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
      </form>
    </div>
  </header>
    <h2>Welcome to your dashboard!</h2>
    <p>This is a simple dashboard with buttons and a search bar.</p>
  </main>
  <footer>
    <p>&copy; 2024 Your Website. All rights reserved.</p>
  </footer>
</body>
</html>

<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
}

nav ul {
  list-style-type: none;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-right: 20px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
}

main {
  padding: 20px;
}

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px 0;
}
.search-container {
  float: right;
  margin-top: 10px;
}

.search-container input[type=text] {
  padding: 8px;
  margin-top: 10px;
  font-size: 17px;
  border: none;
  border-radius: 5px;
}

.search-container button {
  float: right;
  padding: 8px 10px;
  margin-top: 10px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

</style>
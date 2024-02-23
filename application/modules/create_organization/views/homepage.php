<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href='homepage.css')?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    .inline-menu {
      display: inline-block;
      margin-left: 10px; /* Adjust margin as needed */
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-light justify-content-between fs-3 mb-3" style="background-color: #1E90FF;">
        <div class="text-center">
        </div>
        <span class="mx-auto">Dashboard</span>
    </nav>

    <div class="container mb-3">
        <div class="row">
            <div class="col">
                <button id="btn_add_new" class="btn btn-success mb-1">Organization</button>
				<button id="btn_add_new" class="btn btn-success mb-1">About Us</button>
            </div>
            <div class="col">
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search ">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            </div>
        </div>
    </div>
  </header>
  <main>
    <img src="welcome.jpg" class="img-fluid">
    <img src="background.jpg" class="img-fluid">
  </main>
  <footer>
    <p>&copy; 2024 Your Website. All rights reserved.</p>
  </footer>
</body>
</html>

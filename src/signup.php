<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

//start the session
session_start();


require './functions.php';
require_once("../../../../mysql_connect.php");
$error = '';

//if the user got onto signup.php through a form, then proceed. else redirect them back to index.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
} else {
    header("Location: ./index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        form input {
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        form button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            display: inline;
            margin-right: 10px;
        }
        .footer-columns {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-column {
            flex: 1;
            padding: 0 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>Paft Property Portal</h1>
</header>

<main>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="index.html" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        <p>Already have an account? <a href="signin.html">Sign in</a></p>
    </div>
</main>

<footer>
    <div class="container footer-columns">
        <div class="footer-column">
            <div class="footer-links">
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="https://www.maps.ie/site-map.htm">Sitemap</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-column">
            <div class="footer-links">
                <ul>
                    <li><a href="#">Cookie Policy</a></li>
                    <li><a href="#">Join Our Team</a></li>
                    <li><a href="#">Agent Zone</a></li>
                    <li><a href="Testimonial.html">Reviews</a></li>
                    <li><a href="#">Agency Products</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <p>&copy; 2024 Paft Properties. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>

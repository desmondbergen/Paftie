<?php
//errors directive
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require('./functions.php');
require("../../../../mysql_connect.php");

//if no permission level was found, assume user isn't logged in and set the permission to public
if (!isset($_SESSION["permission"])) {
    $_SESSION["permission"] = "public";
}


if (isset($_SESSION['user'])) {
    if (!isset($_COOKIE['user'])) {
        setcookie("user", $_SESSION['user']);
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>

    <?php
    include("./header.php");
    ?>
    <div class="container">
        <div class="ad-container">
            <div class="ad">
                <p>AD GOES HERE</p>
            </div>
            <div class="ad">
                <p>AD GOES HERE</p>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Property Listings</h2>
        <section class="property-listings">
            <div class="section featured">
                <h3>Featured Properties</h3>
                <div class="featured-grid">

                    <?php
                    $query = "SELECT * FROM property";
                    $result = mysqli_query($db_connection, $query);

                    if ($result !== false) {
                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        //the featured array won't be the entire property array
                        array_pop($rows);
                        foreach ($rows as $row) {
                            propertyBuilder($row,true);
                        }
                    } else {
                        echo mysqli_error($db_connection);
                    }

                    mysqli_free_result($result);



                    ?>
                </div>
            </div>

            <!-- ALL PROPERTIES -->
            <div class="section all-properties">
                <h3>All Properties</h3>
                <div class="property_list">
                    <?php


                    $query = "SELECT * FROM property";
                    $result = mysqli_query($db_connection, $query);

                    if ($result !== false) {
                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($rows as $row) {
                            propertyBuilder($row,false);
                        }
                    } else {
                        echo mysqli_error($db_connection);
                    }

                    mysqli_free_result($result);



                    ?>

                </div>
            </div>
        </section>

        <!-- output testimonials here -->
        <h3>Testimonials</h3>
        <div class="section testimonials">
            
            <?php

            //create query statement
            $query = "SELECT * FROM testimonials";
            //execute query on Paft database
            $result = mysqli_query($db_connection, $query);


            //if there is a result:
            if ($result !== false) {
                //get the result as rows
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                $profilePath = "";


                foreach ($rows as $row) {
                    //if a profile pic is available for the testimonial, use it. otherwise use the default profile pic
                    if (is_null($row["profile_path"])) {
                        $profilePath = "profiles/default.png";
                    } else {
                        $profilePath = $row["profile_path"];
                    }
                    echo /*html*/ '<div class="testimonial">';
                    echo /*html*/ '<div class="testimonial-profile">
                                    <img class="profile" src="../assets/' . $profilePath . '">
                                </div>';
                    echo/*html*/  "<span class='testimonial-email '><span class='bold'> " . $row["user_email"] . "</span> </span>";
                    echo /*html*/ "<span class='testimonial_description'>" . $row["text"] . "</span>";
                    echo /*html*/ "</div>";
                }
            } else {
                echo mysqli_error($db_connection);
            }

            mysqli_free_result($result);



            ?>
        </div>
    </div>
    </div>


    <?php
    include("./footer.php")
    ?>

    <script src="./scripts/modal.js"></script>
</body>

</html>
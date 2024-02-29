<?php

// Initialize the session
session_start();

//If the user is not signed in, redirect to the signin page
if ($_SESSION["loggedin"] !== true) {
    header("location:signin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Art by You - Post</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Art by You</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="artists.php">Artists</a></li>
                        <li class="nav-item"><a class="nav-link" href="collections_T.php">Collections</a></li>
                        
                        <?php

                        // If user is signed in, show the drop down menu to sign out
                        if ($_SESSION["loggedin"] == true) {
                            $output = <<<HTML
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign In</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <form method="post">
                                    <li><div class="dropdown-item"><button id="signin" type="signin" name="signin" style="background:none; border:none;font-size:1em;color:black;">Sign In</button></div></li>
                                    <li><div class="dropdown-item"><button id="signout" type="signout" name="signout" style="background:none; border:none;font-size:1em;color:black;">Sign Out</button></div></li>
                                    </form>
                                </ul>
                            </li>
                            HTML;
                            echo $output;
                        }

                            // Redirecting to post page if the user selects sign in
                            if (isset($_POST['signin'])) {
                                header("location: post.php");
                                exit;
                            }

                            // Destroying the session if the user selects sign out
                            if (isset($_POST['signout'])) {
                                session_unset();
                                session_destroy();
                                header("location: signin.php");
                                exit;
                            }
                            
                            ?>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <!-- New art upload form-->
                <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <?php
                        
                        // Extracting the artistID from the $_Session global array
                        $artistID1 = $_SESSION["artistID"];

                            // Connecting the database
                            require_once 'serverlogin.php';
                            $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
                            if (!$conn) {
                                die("Connection failed!" . mysqli_connect_error());
                            }
                            
                            // Querying the database to get the artist name
                        $artistNameQuery = mysqli_query($conn, "SELECT Name FROM artists WHERE ArtistID = '$artistID1'");
                        $artistNameResult = mysqli_fetch_assoc($artistNameQuery);
                        $artistName = $artistNameResult["Name"];
                        
                        // Displaying the heading of the page
                        $output = <<<HTML
                         <h1 class="fw-bolder">$artistName Upload New Art</h1>
                        HTML;
                        echo $output;

                        // Closing the database connection
                        $conn->close();
                        
                        ?>
                        
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="contactForm" method="post">
                              <!-- Art title input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="title" type="text" name="title" placeholder="Enter your art title..." data-sb-validations="required" />
                                    <label for="title">Art Title</label>
                                    <div class="invalid-feedback" data-sb-feedback="title:required">A title for the art is required.</div>
                                </div>
                                <!-- Art theme input -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="theme" type="text" name="theme" placeholder="Enter your art theme..." data-sb-validations="required" />
                                    <label for="theme">Theme</label>
                                    <div class="invalid-feedback" data-sb-feedback="theme:required">A theme for the art is required.</div>
                                </div>
                                <!-- Art file name input -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="file" type="text" name="file" placeholder="Enter your art file name..." data-sb-validations="required" />
                                    <label for="file">File Name</label>
                                    <div class="invalid-feedback" data-sb-feedback="file:required">A file name for the art is required.</div>
                                </div>
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the new art-->
                                <!-- has successfully uploaded-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">New art uploaded!</div>
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error uploading new art-->
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error uploading new art!</div>
                                </div>
                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit" name="submitButton">Submit</button></div>
                            </form>

                            <!-- php code for storing the form input data into artbyyou database's artwork table -->
                            <?php

                            // Connecting the database
                            require_once 'serverlogin.php';
                            $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
                            if (!$conn) {
                                die("Connection failed!" . mysqli_connect_error());
                            }

                            if (isset($_POST['submitButton'])){

                                // Extracting information from the form input and storing them into variables
                                $title = $_POST["title"];
                                $theme = $_POST["theme"];
                                $file = "files/" . $theme . "/" . $_POST["file"];

                                // Checking if the input fields are empty
                                if ($title == '' || $theme == '' || $file == ''){
                                    $output = <<<HTML
                                    <p style="text-align:center; padding-top:30px;">Please enter all the information.</p>
                                    HTML; 
                                    echo $output;
                                }else{

                                    // Querying data from themes table
                                    $myquery = "SELECT ThemeID FROM themes WHERE Theme = '$theme'";
                                    $result = mysqli_query($conn, $myquery);
                                    $row = mysqli_fetch_assoc($result);
                                    $artistID = $_SESSION["artistID"];
                                    $themeID = $row["ThemeID"];

                                    // Inserting data into the artwork table using prepared statement
                                    $sql = $conn->prepare("INSERT INTO artwork (Title, ArtImage, ThemeID, ArtistID) Values (?,?,?,?)");

                                    // Binding the statement
                                    $sql->bind_param("ssii", $title, $file, $themeID, $artistID);

                                    // Executing the query
                                    $sql->execute();

                                    // Closing the database connection and prepared statement
                                    $sql->close();
                                    $conn->close();

                                    // Artwork upload success message
                                    $output = <<<HTML
                                    <p style="text-align:center; padding-top:30px;">Art upload successful!</p>
                                    HTML;
                                    echo $output;
                                }
                            }
                            
                            ?>

                        </div>
                    </div>
                </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2022</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>
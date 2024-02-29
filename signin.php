<?php
    
    // Initializing the session
        session_start();
        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Art by You - Sign In</title>
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
                        <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <!-- Sign In form-->
                <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Sign In</h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="contactForm" method="post">
                                <!-- Username input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" type="text" placeholder="Enter your username..." data-sb-validations="required" name="username" />
                                    <label for="username">Username</label>
                                    <div class="invalid-feedback" data-sb-feedback="username:required">A username is required.</div>
                                </div>
                                <!-- Password input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" type="password" placeholder="Enter your password..." data-sb-validations="required" name="password" />
                                    <label for="password">Password</label>
                                    <div class="invalid-feedback" data-sb-feedback="password:required">A password is required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="password:email">Password is not correct.</div>
                                </div>
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the user-->
                                <!-- has successfully signed in-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Sign in successful!</div>
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error signing in-->
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error signing in!</div>
                                </div>
                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit" name="submitButton">Submit</button></div>
                            </form>

                            <!-- php code signing in a user to the website -->
                            <?php

                            // Connecting the database
                            require_once 'serverlogin.php';
                            $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
                            if (!$conn) {
                                die("Connection failed!" . mysqli_connect_error());
                            }

                            if (isset($_POST['submitButton'])) {

                                // Extracting information from the form input and storing them into variables
                                $username = trim($_POST["username"]);
                                $password = trim($_POST["password"]);

                                // Checking if the username and password input fields are empty
                                if (!isset($username) || trim($username) == '') {
                                    $output1 = <<<HTML
                                    <p style="text-align:center; padding-top:30px;">Please enter your username.</p>
                                    HTML;
                                    echo $output1;
                                } else if (!isset($password) || trim($password) == '') {
                                    $output2 = <<<HTML
                                    <p style="text-align:center; padding-top:30px;">Please enter your password.</p>
                                    HTML;
                                    echo $output2;
                                } else {

                                    // Checking if the username and password exists in the signin table
                                    $result1 = mysqli_query($conn, "SELECT Username FROM signin WHERE Username = '$username'");
                                    if (mysqli_num_rows($result1) == 0) {
                                        $output3 = <<<HTML
                                    <p style="text-align:center; padding-top:30px;">Username is incorrect. Please try again.</p>
                                    HTML;
                                        echo $output3;
                                    }
                                    $result2 = mysqli_query($conn, "SELECT Password FROM signin WHERE Password = '$password'");
                                    if (mysqli_num_rows($result2) == 0) {
                                        $output4 = <<<HTML
                                    <p style="text-align:center; padding-top:30px;">Password is incorrect. Please try again.</p>
                                    HTML;
                                        echo $output4;
                                    }
                                    $result3 = mysqli_query($conn, "SELECT Username, Password FROM signin WHERE Username = '$username' AND Password = '$password'");
                                    if (mysqli_num_rows($result3) > 0) {
                                        
                                        //redirects the user from the signin.php page to post.php page
                                        $_SESSION["loggedin"] = true;
                                        
                                        // Querying database to extract the UserID
                                        $userIDQuery = mysqli_query($conn, "SELECT UserID FROM signin WHERE Username = '$username'");
                                        $userIDResult = mysqli_fetch_assoc($userIDQuery);
                                        $_SESSION["userID"] = $userIDResult["UserID"];

                                        // Querying the database to extract the ArtistID
                                        $artistIDQuery = mysqli_query($conn, "SELECT ArtistID FROM signin WHERE Username = '$username'");
                                        $artistIDResult = mysqli_fetch_assoc($artistIDQuery);
                                        $_SESSION["artistID"] = $artistIDResult["ArtistID"];
                                        
                                        header("location: post.php");
                                        exit;
                                    }
                                }
                            }

                            ?>

                            <p style="text-align:center; margin-top: 50px; margin-bottom:0"><b>Don't have an account?</b></p>
                            <p style="text-align:center;"><b>Join now and start posting your artwork.</b></p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-center">
                                <a class="btn btn-primary btn-sm px-4 me-sm-3" href="createAccount.php">Create Account</a>
                            </div>
                        </div>
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
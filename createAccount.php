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
    <title>Art by You - Create Account</title>
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
                <!-- Create account form-->
                <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Create New Account</h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="contactForm" method="post">
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" name="name" />
                                    <label for="name">Name</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                </div>
                                <!-- Artist type input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="artistType" type="text" placeholder="Enter your type..." data-sb-validations="required" name="artistType" />
                                    <label for="artistType">Type of Artist</label>
                                    <div class="invalid-feedback" data-sb-feedback="artistType:required">An artist type is required.</div>
                                </div>
                                <!-- About you input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="aboutYou" type="text" placeholder="Enter something about you..." data-sb-validations="required" name="aboutYou" />
                                    <label for="aboutYou">Tell us about you</label>
                                    <div class="invalid-feedback" data-sb-feedback="aboutYou:required">An about you is required.</div>
                                </div>
                                <!-- Image upload input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="imageUpload" type="text" placeholder="Upload an image of yourself..." data-sb-validations="required" name="imageUpload" />
                                    <label for="imageUpload">Upload an image of yourself</label>
                                    <div class="invalid-feedback" data-sb-feedback="imageUpload:required">An image of you is required.</div>
                                </div>
                                <!-- Username input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" type="text" placeholder="Enter a username..." data-sb-validations="required" name="username" />
                                    <label for="username">Create a Username</label>
                                    <div class="invalid-feedback" data-sb-feedback="username:required">A username is required.</div>
                                </div>
                                <!-- Password input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" type="password" placeholder="Enter your password..." data-sb-validations="required" name="password" />
                                    <label for="password">Create a Password</label>
                                    <div class="invalid-feedback" data-sb-feedback="password:required">A password is required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="password:email">Password is not correct.</div>
                                </div>
                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit" name="submitButton">Submit</button></div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the user-->
                        <!-- has successfully created an account-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Account creation successful!</div>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error creating an account-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error creating account!</div>
                        </div>
                        </form>
                    </div>

                    <div style="display:flex; justify-content:center; padding-top:50px;">

                        <!-- php code for storing the form input data into artbyyou database's signin and artists table -->
                        <?php

                        // Connecting the database
                        require_once 'serverlogin.php';
                        $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
                        if (!$conn) {
                            die("Connection failed!" . mysqli_connect_error());
                        }

                        if (isset($_POST['submitButton'])) {

                            // Extracting information from the form input and storing them into variables
                            $name = $_POST["name"];
                            $artistType = $_POST["artistType"];
                            $aboutYou = $_POST["aboutYou"];
                            $imageUpload = "files/artists/" . $_POST["imageUpload"];
                            $username = $_POST["username"];
                            $password = $_POST["password"];

                            // Checking if the input fields are empty
                            if ($name == '' || $artistType == '' || $aboutYou == '' || $imageUpload == '' || $username == '' || $password == ''){
                                $output = <<<HTML
                                    <p style="text-align:center;">Please enter all the information.</p>
                                    HTML;
                                echo $output;
                            }else{

                                // Checking if the username exists in the signin table
                                $result = mysqli_query($conn, "SELECT * FROM signin WHERE Username = '$username'");
                                if (mysqli_num_rows($result) > 0) {
                                    echo "Username already exists. Please try again.";
                                } else {
                                    // Inserting data into the artists table using prepared statement
                                    $sql1 = $conn->prepare("INSERT INTO artists (Name, ArtistImage, Type, Description) Values (?,?,?,?)");

                                    // Binding the statement
                                    $sql1->bind_param("ssss", $name, $imageUpload, $artistType, $aboutYou);

                                    // Executing the query
                                    $sql1->execute();

                                    // Closing the prepared statement
                                    $sql1->close();

                                    // Extracting the ArtistID from the last data insertion in the artists table
                                    $artistID = mysqli_insert_id($conn);

                                    // Inserting data into the signin table using prepared statement
                                    $sql2 = $conn->prepare("INSERT INTO signin (ArtistID, Username, Password) Values (?,?,?)");

                                    // Binding the statement
                                    $sql2->bind_param("iss", $artistID, $username, $password);

                                    // Executing the query
                                    $sql2->execute();

                                    // Closing the prepared statement
                                    $sql2->close();

                                    // Closing the database connection
                                    $conn->close();

                                    // Creates the account for the user and signs in the user
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["artistID"] = $artistID;

                                    //Redirects the user from the createAccount.php page to post.php page
                                    header("location: post.php");
                                    exit;
                                }
                            }
                        }

                        ?>

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
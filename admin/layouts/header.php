<?php

session_start();

include_once '../server/connection.php';

$profilePicture = null;


if (!isset($_SESSION['profile']) || $_SESSION['profile'] === 'standard') {
    // redirect the user if they do not have access
    $_SESSION['message'] = "You do not have access to the page";
    $_SESSION['message_type'] = "danger";
    header('location: ../index.php');
    exit();
}


if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        session_destroy();
        header("location: ../login.php");
        exit();
    }
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    $userEmail = $_SESSION['user_email'];

    // Fetch user profile picture from the database
    $stmt = $conn->prepare("SELECT photo FROM user WHERE email = ?");
    $stmt->execute([$userEmail]);
    $user = $stmt->fetch();

    if ($user && $user['photo']) {
        $profilePicture = $user['photo'];
    }

    $loggedInClass = ''; // Class for logged-in users
    $loggedOutClass = 'hide-view'; // Class for logged-out users
} else {
    $loggedInClass = 'hide-view'; // Class for logged-in users
    $loggedOutClass = ''; // Class for logged-out users
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body class="admin">

    <nav class="navbar admin navbar-expand-lg bg-body-tertiary py-3 fixed-top">
        <div class="container admin">
            <a href="stats.php"><img class="logo" src="../assets/images/openbooks.svg" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-buttons">
                    <li class="nav-item">
                        <a class="nav-link" href="stats.php">Stats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_list.php">User List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book_list.php">Book List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="borrowed_books.php">Borrowed Books</a>
                    </li>

                    <li class="nav-item  <?= $loggedOutClass ?>">
                        <a href="#"><i class="fas fa-user"></i></a>
                    </li>

                    <li class="nav-item <?= $loggedInClass ?>">
                        <div class="dropstart">
                            <img class="profile-img" alt="avatar2" src="../assets/images/users/<?= $profilePicture ?>" data-bs-toggle="dropdown" />

                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="?logout=1">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php

session_start();

include_once 'connection.php';

if (isset($_POST['login_btn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password); // hash the password

  $stmt = "SELECT * FROM user WHERE email = ? and password = ?";
  $ps = $conn->prepare($stmt);
  $params = array($email, $password);
  $ps->execute($params);

  if ($user = $ps->fetch()) {
    $_SESSION['message'] = "Login Successful";
    $_SESSION['message_type'] = "success";
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_name'] = $user['username'];
    $_SESSION['profile'] = $user['role'];
    $_SESSION['logged_in'] = true;
    header('location: ../account.php');
    exit();
  } else {
    $_SESSION['message'] = "Invalid email or password";
    $_SESSION['message_type'] = "danger";
    header('location: ../login.php');
  }

}

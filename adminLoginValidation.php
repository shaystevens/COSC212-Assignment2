<?php
session_start();
include('privateFiles/sqlConnection.php');
if ($conn->connect_errno) {
    $_SESSION['error'] = "Something went wrong with connecting";
}
$loginUser = $conn->real_escape_string($_POST['username']);
$loginPassword = $conn->real_escape_string($_POST['password']);

$query = "SELECT * FROM Assignment WHERE username = '$loginUser'";
$result = $conn->query($query);

if ($result->num_rows != 0) {
    $object = $result->fetch_object();
    if ((strcmp($object->username, $loginUser) == 0) && (strcmp($object->password, sha1($loginPassword)) == 0)) {
        $_SESSION['admin'] = $loginUser;
        header('Location: admin.php');
        exit;
    } else {
        $_SESSION['error'] = 'Incorrect password';
        header('Location: adminLogin.php');
        exit;
    }
} else {
    $_SESSION['error'] = 'User ' . $loginUser . ' does not exist';
    header('Location: adminLogin.php');
    exit;
}

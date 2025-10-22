<?php 
require_once('../connection.php');
require_once('../classes/User.php');

$user = new User($connect);

// ✅ ADD USER
if (isset($_POST['btn_save'])) {
    $first_name   = $_POST['first_name'];
    $last_name    = $_POST['last_name'];
    $email        = $_POST['email'];
    $gender       = $_POST['gender'];
    $user_address = $_POST['user_address'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];

    // Add user with auto date_created
    if ($user->addUser($first_name, $last_name, $email, $gender, $user_address, $username, $password)) {
        header("Location: ../index.php?msg=added");
        exit();
    } else {
        echo "Error adding user.";
    }
}

// ✅ UPDATE USER
if (isset($_POST['update_btn'])) {
    $user_id      = $_POST['user_id'];
    $first_name   = $_POST['first_name'];
    $last_name    = $_POST['last_name'];
    $email        = $_POST['email'];
    $gender       = $_POST['gender'];
    $user_address = $_POST['user_address'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];

    if ($user->updateUser($user_id, $first_name, $last_name, $email, $gender, $user_address, $username, $password)) {
        header("Location: ../index.php?msg=updated");
        exit();
    } else {
        echo "Error updating user.";
    }
}

// ✅ DELETE USER
if (isset($_POST['delete_btn'])) {
    $user_id = $_POST['user_id'];

    if ($user->deleteUser($user_id)) {
        header("Location: ../index.php?msg=deleted");
        exit();
    } else {
        echo "Error deleting user.";
    }
}
?>

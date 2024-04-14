<?php
include '../settings/connection.php'; // Include the connection file
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    
   
    // Retrieve form data
    $userType = mysqli_real_escape_string($conn, $_POST['userType']); // Assuming you have a form field for user ID

    if($userType=="student"){
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
    $major = mysqli_real_escape_string($conn, $_POST['major']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2= mysqli_real_escape_string($conn, $_POST['password2']);
    // Assuming you have a 'terms' checkbox, you can use isset() to check if it's checked
    $terms = isset($_POST['terms']) ? true : false;
    }
    else if($userType=="admin"){
    $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2= mysqli_real_escape_string($conn, $_POST['password2']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $terms = isset($_POST['terms']) ? true : false;
    }


  if($userType=="admin"){
    echo "hello";
  }
  else{
    echo "wow";
  }
    

    // Validate input fields
    $errors = [];
  
    // Perform validation as needed
    // Example validation:
    if($userType=="student"){
    if (empty($userType) || empty($firstName) || empty($lastName) || empty($email) || empty($phoneNumber) || !$terms ||empty($password) || empty($password2 )) {
        $errors[] = "Please fill in all fields and agree to the terms.";
    }
}



else if($userType=="admin"){
    if (empty($userType) || empty($admin_name) || empty($email) || empty($phoneNumber) || empty($password) || empty($password2) || empty($department)) {
        $errors[] = "Please fill in all fields and agree to the terms.";
    }
    

    var_dump($errors);
    // Check if there are any errors
    if (empty($errors)) {
        
        // Start a transaction
        //mysqli_autocommit($conn, false);

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        //checking if usertype is a student
        if($userType=="student"){

       

        // Insert user data into the database
        $sql = "INSERT INTO students (FirstName, LastName, Major, Email, PhoneNumber, psw) 
        VALUES ('$firstName', '$lastName', ' $major', '$email', '$phoneNumber', '$hashedpassword')";


        $insertResult = mysqli_query($conn,$sql);

        if($insertResult){
            $success_message = 'Registration was successful!!';
            echo json_encode(array('success' => $success_message));
            exit();
            
        }
        else{
            $error_message = 'Registration was not successful!!';
            echo json_encode(array('error' => $error_message));
            exit();

        }
    }
    else if($userType=="admin"){

    

         // Insert user data into the database
         $sql = "INSERT INTO admins (FirstName, department, Email, PhoneNumber, psw) 
         VALUES (' $admin_name', ' $department', '$email', '$phoneNumber', '$hashedpassword')";
 
 
         $insertResult = mysqli_query($conn,$sql);
 
         if($insertResult){
             $success_message = 'Registration was successful!!';
             echo json_encode(array('success' => $success_message));
             exit();
             
         }
         else{
             $error_message = 'Registration was not successful!!';
             echo json_encode(array('error' => $error_message));
             exit();
 
         }

    }

        
}
}
}
?>
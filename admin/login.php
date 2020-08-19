<?php
    require('connection.inc.php');
    require('functions.inc.php');

    $msg = '';
    $count = 0;
    // When submit is clicked
    if ( isset($_POST['login-submit']) ){
        // Get username and Password
         $username = get_safe_value($con, $_POST['username']);
         $password = get_safe_value($con, $_POST['password']);

        // SQL query to get data from admin_users table
        $query = "select * from admin_user where username='$username' and password='$password'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        
        // If Data is coming 
        if ($count > 0){
            // Login the admin
            $_SESSION['ADMIN_LOGIN'] = 'yes';
            $_SESSION['ADMIN_USERNAME'] = $username;
            header('location:categories.php'); // Redirect
            die();

        }else{
            $msg = "Invalid username or password";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css" type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&display=swap" rel="stylesheet">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="login-wrapper">
            <div class="login-container">
                    <h1 class='heading-login'>Login</h1>
                    <form action="" method='POST' name='login-form'>
                        <input type="text" autofocus placeholder='Enter Username' required name='username'>
                        <input type="password" placeholder='Enter Password' required name='password'>
                        <input type="submit" name='login-submit' id='login-btn' value='Sign In' >
                        
                    </form>
                    <div class='login-error'><?php echo $msg ?></div>
            </div>
        </div>
    </div>
    
</body>
</html>
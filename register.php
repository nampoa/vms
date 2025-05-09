<?php
require('config/db.php');

$errors = ['firstname'=>'', 'lastname'=>'', 'phone'=>'', 'email'=>'', 'password'=>''];

if(isset($_POST['login'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

   if(empty($firstname)) {
        $errors['firstname'] = "Firstname is required";
    } else {
        // validation 
        if(!preg_match('/^[A-Za-z]{3,15}$/', $firstname)) {
            $errors['firstname'] = "Firstname must not contain a number or symbol";
        }
    }
    
    if(empty($lastname)) {
        $errors['lastname'] = "Lastname is required";
    }
    
    if(empty($phone)) {
        $errors['phone'] = "Phone is required";
    } else {
        if(!preg_match('/^[0-9]{10}$/', $phone)){
            $errors['phone'] = "Phone number must have 10digits";
        }
    }
    
    if(empty($email)) {
       $errors['email'] = "Email is required";
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email must be a valid email";
        }
    }

    if(empty($password)) {
        $errors['password'] = "Password is required";
    } else {
        if($password != $cpassword) {
            $errors['password'] = "Passwords do not match";
        }
    }

    if(empty($cpassword)) {
        $errors['cpassword'] = "Confirm password is required";
    }

    if(!array_filter($errors)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = $conn->query("INSERT INTO users(firstname,lastname,email,phone,password) VALUES ($firstname, $lastname, $email,$phone,$password)");

        if($query == true) {
            $_SESSION['success'] = "User created successfully";
            header('location: register.php');
        }
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="chip.png" type="image/x-icon">
</head>
<body>
    <div class="container">
    <form action="" method="post" class="form">
        <h2>Register</h2>
        <div>
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" value="<?=$firstname ?? ''?>" placeholder="Firstname">
            <p class="error"><?php echo $errors['firstname'] ?></p>
        </div>
        <div>
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" placeholder="Lastname">
            <p class="error"><?php echo $errors['lastname'] ?></p>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" placeholder="Phone Number">
            <p class="error"><?php echo $errors['phone'] ?></p>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email Address">
            <p class="error"><?php echo $errors['email'] ?></p>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
            <p class="error"><?php echo $errors['password'] ?></p>
        </div>
        <div>
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" placeholder="Confirm Password">
            <p class="error"><?php echo $errors['cpassword'] ?></p>
        </div>
        <div>
            <input class="btn" type="submit" name="login" placeholder="Login">
        </div>
        <p>
            <?php if(isset($_SESSION['success'])) {
             echo $_SESSION['success'];
            }
            ?>
        </p>
        <p>Already have an account? Login <a href="index.php">here</a></p>
    </form>
</div>
</body>
</html>
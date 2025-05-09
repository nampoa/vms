<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="chip.png" type="image/x-icon">
</head>
<body>
    <!-- hii ni form ya login  -->
    <div class="container">
    <form action="" method="post" class="form">
        <h2>Login</h2>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email Address">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div>
            <input class="btn" type="submit" name="login" placeholder="Login">
        </div>
        <p>Don't have an account? Register <a href="register.php">here</a></p>
    </form>
</div>
</body>
</html>
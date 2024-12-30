
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_admin</title>
</head>
<body>
<div class="container" id="container">

<div class="form-container register-container">
  <form action="validate_admin.php" method="post" autocomplete="off">
    <h1>login here</h1>
    

    <label for="email">nama</label>
    <input type="text" name="email" required>

    <label for="password">password</label>
    <input type="text" name="password" required>

    <button type="submit" name="submit">Submit</button>

    <tr>
    <a href="login.php">login citizen</a>
    <a href="register_admin.php">register admin</a>  
    </tr>
</body>
</html>
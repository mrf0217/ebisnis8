
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi</title>
</head>
<body>
<div class="container" id="container">

<div class="form-container register-container">
  <form action="validate.php" method="post" autocomplete="off">
    <h1>login here</h1>
    

    <label for="nama">nama</label>
    <input type="text" name="nama" required>

    <label for="ibu_kandung">ibu_kandung</label>
    <input type="text" name="ibu_kandung" required>

    <button type="submit" name="submit">Submit</button>

    <tr>
    <a href="login_admin.php">login admin</a> 
    <a href="register.php">register citizen</a> 
    </tr>
</body>
</html>
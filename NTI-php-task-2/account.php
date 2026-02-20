<?php
session_start();


$loggedIn = isset($_SESSION['user_email']);

$errors = [];

// معالجة فورم Login
if(isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validation
    if(empty($email)) {
        $errors[] = "Email is required.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if(empty($password)) {
        $errors[] = "Password is required.";
    } elseif(strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    
    if(empty($errors)) {
        $_SESSION['user_email'] = $email;
        $_SESSION['user_password'] = $password;
        header("Location: product.php"); // بعد تسجيل الدخول
        exit;
    }
}


if(isset($_POST['profile'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $facebook = trim($_POST['facebook']);
    $twitter = trim($_POST['twitter']);
    $instagram = trim($_POST['instagram']);

    
    if(empty($username)) $errors[] = "Username is required.";
    if(empty($password) || strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if(empty($phone) || !preg_match("/^[0-9]{10,15}$/", $phone)) $errors[] = "Phone number must be 10-15 digits.";
    if(!empty($facebook) && !filter_var($facebook, FILTER_VALIDATE_URL)) $errors[] = "Facebook URL is invalid.";
    if(!empty($twitter) && !filter_var($twitter, FILTER_VALIDATE_URL)) $errors[] = "Twitter URL is invalid.";
    if(!empty($instagram) && !filter_var($instagram, FILTER_VALIDATE_URL)) $errors[] = "Instagram URL is invalid.";

    
    if(empty($errors)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['facebook'] = $facebook;
        $_SESSION['twitter'] = $twitter;
        $_SESSION['instagram'] = $instagram;

        header("Location: home.php"); 
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">


  <?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach($errors as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if(!$loggedIn): ?>

    <h3 class="mb-4 text-center">Login to Your Account</h3>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
      </div>

      <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>

  <?php else: ?>
    
    <h3 class="mb-4 text-center">Update Your Profile</h3>
    <form action="" method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="<?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : '' ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($_SESSION['email'] ?? $_SESSION['user_email']) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($_SESSION['phone'] ?? '') ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Facebook URL</label>
        <input type="url" class="form-control" name="facebook" value="<?= htmlspecialchars($_SESSION['facebook'] ?? '') ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Twitter URL</label>
        <input type="url" class="form-control" name="twitter" value="<?= htmlspecialchars($_SESSION['twitter'] ?? '') ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Instagram URL</label>
        <input type="url" class="form-control" name="instagram" value="<?= htmlspecialchars($_SESSION['instagram'] ?? '') ?>">
      </div>

      <button type="submit" name="profile" class="btn btn-success w-100">Update Profile</button>
    </form>

  <?php endif; ?>

  <div class="mt-3 text-center">
    <a href="logout.php" class="btn btn-secondary">Logout</a>
  </div>

</div>
</body>
</html>

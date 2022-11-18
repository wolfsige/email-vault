<?php include 'inc/header.php'; ?>

<?php
  $name = $email = '';
  $nameErr = $emailErr = '';

  if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
      $nameErr = 'A Name is Required';
    } else {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }
  

    if(empty($_POST['email'])){
      $emailErr = 'An Email is Required';
    } else {
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    if(empty($nameErr && $emailErr)){
      $sql = "INSERT INTO `vault-data` (name, email) VALUES('$name', '$email')";
    }

    if(mysqli_query($conn, $sql)){
      header('Location: view.php');
    } else {
      echo 'Error: ' . mysqli_error($conn);
    }
  }
?>

  <h1>Add a new Name and Email!</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div>
      <label for="name">Name:</label></br>
      <input type="text" id="name" name="name" placeholder="Enter Your Name"></br>
      <?php echo $nameErr; ?>
    </div>
    <div>
      <label for="email">Email:</label></br>
      <input type="email" id="email" name="email" placeholder="Enter Your Email"></br>
      <?php echo $emailErr; ?>
    </div>
    <input type="submit" name="submit" value="Send">
  </form>
</body>
</html>
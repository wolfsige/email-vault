<?php include 'inc/header.php'; ?>
<link rel="stylesheet" href="style/index-style.css">

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
          $email = mysqli_real_escape_string($conn, $_POST['email']);
      }

      if(empty($nameErr && $emailErr)){
          $sql = "INSERT INTO `vault-data` (name, email) VALUES('$name', '$email')";

          if(mysqli_query($conn, $sql)){
            header('Location: view.php');
          } else {
            echo 'Error' . mysqli_error($conn);
          }
      } 
  }
?>

<h1>Add a new Name and Email!</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="body">
        <div class="text">
            <label for="name">Name:</label></br>
            <input type="text" class="input" id="name" name="name" placeholder="Enter Your Name"></br>
            <div class="err">
                <?php echo $nameErr; ?>
            </div>
         </div>
        <div class="text">
            <label for="email">Email:</label></br>
            <input type="email" class="input" id="email" name="email" placeholder="Enter Your Email"></br>
            <div class="err">
                <?php echo $emailErr; ?>
            </div>
        </div>
        <input type="submit" name="submit" value="Submit" class="submit">
    </div>
</form>
</body>
</html>
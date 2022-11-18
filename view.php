<?php include'inc/header.php'; ?>
<link rel="stylesheet" href="style/email-style.css">

<?php 
  $sql = 'SELECT * FROM `vault-data`';
  $result = mysqli_query($conn, $sql);
  $emails = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h1>All Emails</h1>

<?php if(empty($emails)): ?>
  <p>There are no emails here!</p>
<?php endif; ?>

<?php foreach($emails as $item): ?>
<div class="cards">
  <div class="email-list">
    <p>
      <div>
        <?php echo $item['email']; ?></br>
        Owner: <?php echo $item['name']; ?>
      </div>
    </p>
  </div>
</div>
<?php endforeach; ?>
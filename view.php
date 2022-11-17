<?php include'inc/header.php'; ?>

<?php 
  $sql = 'SELECT * FROM `vault-data`';
  $result = mysqli_query($conn, $sql);
  $emails = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h1>Emails Go Here</h1>

<?php if(empty($emails)): ?>
  <p>There are no emails here!</p>
<?php endif; ?>

<?php foreach($emails as $item): ?>
<div class="email-list">
  <p class="email-list-body">
    <?php echo $item['email']; ?>
    <div>
      Owner: <?php echo $item['name']; ?>
    </div>
  </p>
</div>
<?php endforeach; ?>
<?php require_once APPROOT . '/views/includes/header.php' ?>
  <h2>List of your Posts</h2>
  <a href="<?php echo URLROOT ?>/posts/index">Back</a>
  <?php foreach($data['results'] as $results) : ?>
    <div>
      <h3><?php echo $results->title ?></h3>
      <div>
        <p><?php echo $results->body ?></p>
      </div>
      <h4>Created at: <?php echo $results->created_at ?></h4>
      <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $results->id ?>">Edit</a>
      <a href="<?php echo URLROOT ?>/posts/delete/<?php echo $results->id ?>">Delete</a>
    </div>
  <?php endforeach; ?>
<?php require_once APPROOT . '/views/includes/footer.php' ?>
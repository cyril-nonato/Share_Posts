<?php require_once APPROOT . '/views/includes/header.php' ?>
  <div>
    <h2>Add a Post</h2>
    <a href="<?php echo URLROOT ?>/posts/index">Back</a>
    <form action="<?php echo URLROOT ?>/posts/add" method="POST">
      <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo $data['title']?>">
        <p><?php echo $data['title_err'] ?></p>
      </div>
      <div>
        <label for="body">Content</label>
        <textarea type="text" name="body"><?php echo $data['body'];?></textarea>
        <p><?php echo $data['body_err'] ?></p>
      </div>
      <input type="submit" name="add" value="Add Your Post">
    </form>
  </div>
<?php require_once APPROOT . '/views/includes/footer.php' ?>
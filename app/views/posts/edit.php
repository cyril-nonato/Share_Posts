<?php require_once APPROOT . '/views/includes/header.php' ?>
  <h2>Edit this Post</h2>
  <a href="<?php echo URLROOT ?>/posts/show">Back</a>
  <div>
    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id'] ?>" method="POST">
      <div>
        <label for="title">Title</label>
        <input type="text" name="title" value='<?php echo $data['title'] ?>'>
        <p><?php echo $data['title_err'] ?></p>
      </div>
      <div>
        <label for="body">Content</label>
        <textarea type="text" name="body"><?php echo $data['body'] ?></textarea>
        <p><?php echo $data['body_err'] ?></p>
      </div>
      <input type="submit" value="Submit" name="submit">
    </form>
  </div>

<?php require_once APPROOT . '/views/includes/footer.php' ?>
<?php require_once APPROOT . '/views/includes/header.php' ?>
  <section class="posts-add">
    <div class="posts-add-container">
      <h2 class="section-title">Add a Post</h2>
      <a href="<?php echo URLROOT ?>/posts/index">Back</a>
      <form action="<?php echo URLROOT ?>/posts/add" method="POST">
        <div class="form_format">
        <input type="text" name="title" required value="<?php echo $data['title']?>">
          <label for="title" class="label-name">
            <span class="content-name">Title</span>
          </label>
        </div>
        <div class="form_format">
        <textarea required type="text" name="body"><?php echo $data['body'];?></textarea>
          <label for="body" class="label-name">
            <span class="content-name">Content</span>
          </label>
        </div>
        <input class="btn" type="submit" name="add" value="Add new post">
      </form>
    </div>  
  </section>
<?php require_once APPROOT . '/views/includes/footer.php' ?>
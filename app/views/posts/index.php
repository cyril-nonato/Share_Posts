<?php require_once APPROOT . '/views/includes/header.php' ?>
  <div>
    <h1><?php echo 'POSTS'?></h1>
  </div>
  <?php flashRegister('success'); ?>
  <?php flashRegister('delete_post'); ?>
  <div> 
    <?php foreach($data['posts'] as $post): ?>
      <div>
        <h3><?php echo $post->title;?></h3>
        <p><?php echo $post->body; ?></p>
        <p><?php echo get_time_ago($post->postsCreated,$post->updated_at);?></p>
        <h4><?php echo $post->name_user; ?></h4>
      </div>
    <?php endforeach; ?>
  </div>
<?php require_once APPROOT . '/views/includes/footer.php' ?>
<?php require_once "application/components/nav.php"; ?>

<section class="container pt-5">
    <div class="d-flex justify-content-center align-items-center">

      <div class="d-flex flex-column col-7">

          <article class="card text-white bg-dark mb-3">
            <div class="card-header d-flex justify-content-between">
              <h5 class="card-title"><?= $data['news']['title'] ?></h5>
              <?php if (isset($_SESSION['admin'])): ?>
                <a href="news_delete?id=<?= $data['news']['id'] ?>" class="btn btn-danger d-flex justify-content-center align-items-center delete_comment">X</a>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <p class="card-text"><?= $data['news']['desc_news'] ?></p>
              <?php if ($data['news']['img'] != null): ?>
                <img class="img-fluid rounded-bottom w-100" src="../uploads/<?= $data['news']['img'] ?>" alt="img_<?= $data['news']['title'] ?>"
                onError="this.onerror=null;this.src='https://bitsofco.de/content/images/2018/12/Screenshot-2018-12-16-at-21.06.29.png';">
              <?php endif; ?>
            </div>
          </article>

          <?php if (isset($_SESSION['user'])): ?>
            <form class="card text-dark bg-light comments" action="/news/add_comment?user=<?= $_SESSION['user']['id'] ?>" method="post">
              <div class="card-header"><?= $_SESSION['user']['name'] ?></div>
              <div class="card-body">
                <textarea name="text" class="form-control"></textarea>
                <button type="submit" class="btn btn-block btn-info mt-3" name="news" value="<?= $data['news']['id'] ?>">Add comment</button>
              </div>
            </form>
          <?php endif; ?>
        <?php if(isset($data['comments'][0])): ?>
          <div class="p-2 bg-comments">
            <?php foreach($data['comments'] as $comment): ?>
              <div class="card text-dark bg-light comments">
                <div class="card-header d-flex justify-content-between">
                  <span><?= $comment['user'] ?></span>
                  <?php if (isset($_SESSION['user'])): ?>
                    <?php if (isset($_SESSION['admin']) || $comment['user'] == $_SESSION['user']['name']): ?>
                      <a href="comment_delete?id=<?= $comment['id'] ?>&news=<?= $data['news']['id'] ?>" class="btn btn-danger d-flex justify-content-center align-items-center delete_comment">X</a>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
                <div class="card-body">
                  <p class="card-text"><?= $comment['text'] ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>

    </div>

</section>

<style>
h5{
  margin: 0!important;
}
.bg-comments{
  background: #e4e9ee80;
  border-radius: 5px;
}
.comments{
  margin-bottom: 20px;
}
.comments:nth-child(1){
  margin-bottom: 0!important;
}
.comments:nth-child(2){
  margin-top: 20px!important;
}
.delete_comment{
  width: 20px;
  height: 20px;
  padding: 0!important;
  font-size: 10px;
}
</style>

<?php require_once "application/components/nav.php"; ?>

<section class="container pt-5">

    <div class="d-flex justify-content-center align-items-center">

      <div class="d-flex flex-column col-7">

        <?php foreach($data as $row): ?>
          <article class="card text-white bg-dark mb-3">
            <div class="card-header d-flex justify-content-between">
              <h5 class="card-title"><?= $row['title'] ?></h5>
              <?php if (isset($_SESSION['admin'])): ?>
                <a href="/news/news_delete?id=<?= $row['id'] ?>" class="btn btn-danger d-flex justify-content-center align-items-center delete_news">X</a>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <p class="card-text"><?= $row['desc_news'] ?></p>
              <?php if ($row['img'] != null): ?>
                <img class="img-fluid rounded-bottom w-100" src="uploads/<?= $row['img'] ?>" alt="img_<?= $row['title'] ?>"
                onError="this.onerror=null;this.src='https://bitsofco.de/content/images/2018/12/Screenshot-2018-12-16-at-21.06.29.png';">
              <?php endif; ?>
            </div>
            <div class="d-flex w-100 pl-4 pr-4 pb-3 bot">
              <a href="/news/comments?id=<?= $row['id'] ?>" class="b-a d-flex justify-content-center align-items-center"><i class="far fa-comments w-100 h-100"></i></a>
            </div>
          </article>
        <?php endforeach; ?>

      </div>

    </div>

</section>

<style>
h5{
  margin: 0!important;
}
.b-a{
  width: 25px;
  height: 25px;
}
.bot{
  flex-direction: row-reverse;
}
.delete_news{
  width: 20px;
  height: 20px;
  padding: 0!important;
  font-size: 10px;
}
</style>

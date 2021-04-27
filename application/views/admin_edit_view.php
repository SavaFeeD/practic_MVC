<?php require_once "application/components/nav_admin.php"; ?>

<section class="container pt-5">

  <div class="container d-flex flex-column justify-content-center align-items-center">

      <form action="/admin/edit" method="post" enctype="multipart/form-data">
          <table class="table table-dark">
            <thead>
              <tr>
                <?php foreach ($data[0] as $key => $value): ?>
                    <td>
                      <?= $key ?>
                    </td>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($data[0] as $key => $value): ?>
                  <?php if ($key == 'id'): ?>
                    <td><?= $value ?></td>
                  <?php elseif ($key == 'img'): ?>
                    <td>
                      <input type="file" name="<?= $key ?>" value="<?= $value ?>" class="form-control bg-dark text-white">
                    </td>
                  <?php else: ?>
                    <td>
                      <input type="text" name="<?= $key ?>" value="<?= $value ?>" class="form-control bg-dark text-white">
                    </td>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tr>
            </tbody>
          </table>
          <input type="text" name="table" value="<?= $data['table'] ?>" class="d-none">

        <div class="d-flex">
          <a href="/admin/panel" class="btn w-100 btn-info mr-2">BACK</a>
          <button type="submit" class="btn w-100 btn-warning ml-2" name="id" value="<?= $data[0]['id'] ?>">EDIT</button>
        </div>

      </form>


  </div>

</section>

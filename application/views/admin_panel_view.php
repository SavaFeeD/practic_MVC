<?php require_once "application/components/nav_admin.php"; ?>

<section class="container pt-5">

  <?php
    foreach($data as $table_name => $data_table):
        if (count($data_table) != 0):
  ?>
    <hr>
    <h3><?= $table_name ?></h3>
    <hr>
    <form action="/admin/add" method="post" enctype="multipart/form-data">
    <table class="table table-dark">
        <thead>
            <tr>
              <?php
                foreach ($data_table[0] as $fillable_name => $fillable_data):
               ?>
                <td><?= $fillable_name ?></td>
              <?php
                endforeach;
              ?>
                <td class="d-flex justify-content-center align-items-center border-left"><i class="fas fa-cog"></i></td>
            </tr>
        </thead>
        <tbody>
          <?php
            foreach ($data_table as $fillable_arr):
           ?>
            <tr>
              <?php foreach ($fillable_arr as $fillable_name => $fillable_data): ?>
                <?php if ($fillable_name == 'img'): ?>
                  <td><img class="img-fluid w-100" src="../uploads/<?= $fillable_data ?>" alt="img_<?= $fillable_data ?>"</td>
                <?php else: ?>
                  <td><?= $fillable_data ?></td>
                <?php endif; ?>
              <?php endforeach; ?>
                <td class="d-flex justify-content-center align-items-center border-left">
                    <a class="btn btn-danger mr-3" href="/admin/delete?table=<?= $table_name ?>&id=<?= $fillable_arr['id'] ?>"><i class="far fa-trash-alt"></i></a>
                    <a class="btn btn-warning" href="/admin/open_edit?table=<?= $table_name ?>&id=<?= $fillable_arr['id'] ?>"><i class="far fa-edit"></i></a>
                </td>
            </tr>
          <?php
            endforeach;
          ?>
            <tr>
              <?php
                foreach ($data_table[0] as $fillable_name => $fillable_data):
               ?>
                <?php if ($fillable_name == 'id'): ?>
                  <td>. . .</td>
                <?php elseif ($fillable_name == 'img'): ?>
                  <td><input type="file" class="form-control bg-dark text-white" name="<?= $fillable_name ?>" value="null" placeholder="<?= $fillable_name ?>"></td>
                <?php else: ?>
                  <td><input type="text" class="form-control bg-dark text-white" name="<?= $fillable_name ?>" placeholder="<?= $fillable_name ?>"></td>
                <?php endif; ?>
              <?php
                endforeach;
              ?>
              <td class="d-flex justify-content-center align-items-center border-left">
                <button type="submit" class="btn btn-success" name="table" value="<?= $table_name ?>">Add</button>
              </td>
            </tr>
        </tbody>
    </table>
    </form>
    <br/>
  <?php else: ?>
    <hr>
    <h5>Таблица <span class="text-danger"><?= $table_name ?></span> пуста</h5>
    <hr>
  <?php
        endif;
    endforeach;
  ?>

</section>

<style>
thead{
    background: #202327;
}
</style>

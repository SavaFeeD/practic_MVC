<?php

class Model_Admin extends Model
{
    private $success = [
        "user" => "id, name, email, password, role",
        "portfolio" => "id, age, project, desc_project",
        "news" => "id, title, desc_news, img",
        "comments" => "id, user, news, text"
    ];

    public function get_data()
    {
        $response = [];

        foreach ($this->success as $table => $fillable) {
           $response[$table] = DB::query("select $fillable from $table");
        }

        return $response;
    }

    public function delete($table, $id)
    {
        return DB::query("delete from $table where id=$id");
    }

    public function update($data_post, $data_get, $data_files)
    {
      $cols = [];
      $values = [];

      foreach ($data_post as $key => $value) {
        if ($key != 'table' && $key != 'id') {
          array_push($cols, $key);
          array_push($values, '"'.$value.'"');
        }
      }

      if (isset($data_files['img']) && $data_files['img']['name'] != "") {
        $uploaddir = 'uploads/';
        $uploadfile = $uploaddir . basename($data_files['img']['name']);
        move_uploaded_file($data_files['img']['tmp_name'], $uploadfile);
        array_push($cols, 'img');
        array_push($values, '"'.$data_files['img']['name'].'"');
      }

      $arr = [];
      foreach ($cols as $col_key => $col_value) {
        foreach ($values as $val_key => $val_value) {
          if ($col_key == $val_key) {
            array_push($arr, "$col_value = $val_value");
          }
        }
      }

      $data = implode(', ', $arr);
      $table = $data_post['table'];
      $id = $data_post['id'];

      return DB::query("update $table set $data where id=$id");
    }

    public function add($data_post, $data_get, $data_files)
    {
      $cols = [];
      $values = [];

      $table = $data_post['table'];

      foreach ($data_post as $key => $value) {
        if ($key != 'table' && $key != 'id') {
          array_push($cols, $key);
          array_push($values, '"'.$value.'"');
        }
      }

      if (isset($data_files['img'])) {
        $uploaddir = 'uploads/';
        $uploadfile = $uploaddir . basename($_FILES['img']['name']);
        move_uploaded_file($data_files['img']['tmp_name'], $uploadfile);
        array_push($cols, 'img');
        array_push($values, '"'.$_FILES['img']['name'].'"');
      }

      $cols = implode(', ', $cols);
      $values = implode(', ', $values);

      return DB::query("INSERT INTO $table ($cols) VALUES ($values)");
    }
}

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

    public function update($table, $id, $updated)
    {
      return DB::query("update $table set $updated where id=$id");
    }

    public function add($table, $cols, $values)
    {
        return DB::query("INSERT INTO $table ($cols) VALUES ($values)");
    }
}

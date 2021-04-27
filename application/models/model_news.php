<?php

class Model_News extends Model
{
    public function get_data()
    {
        return DB::query("SELECT * FROM news");
    }

    public function get_comments($id_news)
    {
        return [
          "comments" => DB::query("SELECT * FROM comments where news=$id_news"),
          "news" => DB::query("SELECT * FROM news where id=$id_news")[0]
        ];
    }

    public function add_comment($cols, $values)
    {
        return DB::query("INSERT INTO comments ($cols) VALUES ($values)");
    }

    public function delete_comment($id)
    {
        return DB::query("DELETE FROM comments WHERE id=$id");
    }

    public function delete_news($id)
    {
        return DB::query("DELETE FROM news WHERE id=$id");
    }

    public function get_user_name($id_user)
    {
        return DB::query("SELECT name FROM user WHERE id=$id_user")[0];
    }
}

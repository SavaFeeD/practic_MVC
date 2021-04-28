<?php

class Model_News extends Model
{
    public function get_data()
    {
        return DB::query("SELECT * FROM news");
    }

    public function get_comments($id_news)
    {
        $data = [
          "comments" => DB::query("SELECT * FROM comments where news=$id_news"),
          "news" => DB::query("SELECT * FROM news where id=$id_news")[0]
        ];

        foreach ($data['comments'] as $key => $comment) {
          $data['comments'][$key]['user'] = $this->model->get_user_name($comment['user'])['name'];
        }

        return $data;
    }

    public function add_comment($data_post, $data_get)
    {
        $cols = array_merge(array_keys($data_post), array_keys($data_get));
        $values = array_merge(array_values($data_post), array_values($data_get));

        foreach ($values as $key => $value) {
          $values[$key] = "'$value'";
        }

        $cols = implode(', ', $cols);
        $values = implode(', ', $values);

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

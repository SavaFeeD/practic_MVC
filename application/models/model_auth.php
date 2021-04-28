<?php

class Model_Auth extends Model
{
    public function get_data()
    {
      return DB::query('SELECT * FROM user');
    }

    public function add_user($cols, $values)
    {
      return DB::query("INSERT INTO user ($cols) VALUES ($values)");
    }
}

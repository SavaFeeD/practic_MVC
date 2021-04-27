<?php

class Model_Auth extends Model
{
    public function get_data()
    {
      return DB::query('SELECT * FROM user');
    }

    public function is_user($email, $pass)
    {
      $user = DB::query("SELECT * FROM user WHERE email='$email' and password='$pass'")[0];

      if (isset($user)) {
        return $user;
      } else {
        return false;
      }
    }

    public function add_user($cols, $values)
    {
      return DB::query("INSERT INTO user ($cols) VALUES ($values)");
    }
}

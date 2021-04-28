<?php
class Model
{
    public function get_data()
    {

    }

    public function row($table, $id)
    {
      return DB::query("select * from $table where id=$id");
    }

    public function get_admins()
    {
        return DB::query('select * from user where role="admin"');
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
}

<?php


class Controller_Auth extends Controller
{

    function __construct()
    {
        $this->model = new Model_Auth();
        $this->view = new View();
    }

    function action_index()
    {
        if (isset($_SESSION['user'])) {
          header('Location: /');
          die();
        }

        if (isset($_GET['message'])) {
          $this->view->generate('auth_view.php', 'template_view.php', $_GET['message']);
        } else {
          $this->view->generate('auth_view.php', 'template_view.php');
        }

    }

    function action_auth()
    {
      $res = $this->model->is_user($_POST['email'], $_POST['password']);

      $admins = $this->model->get_admins();

      $is_admin = 0;

      foreach ($admins as $admin)
          foreach ($admin as $key => $value)
              foreach ($_POST as $request_key => $request_value)
                  if ($request_key == $key)
                      if ($request_value == $value)
                          $is_admin++;

      if ($is_admin == 2)
          $_SESSION['admin'] = $_POST['email'];

      if ($res) {
        $_SESSION['user'] = $res;
        $name = $res['name'];
        header("Location: /auth?message=Пользователь $name авторизирован");
      } else {
        header('Location: /auth?message=Такого пользователя не существует');
      }
    }

    function action_register()
    {
      $this->view->generate('register_view.php', 'template_view.php');
    }

    function action_logout()
    {
      unset($_SESSION['user']);
      header('Location: /');
    }
}

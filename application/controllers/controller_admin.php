<?php


class Controller_Admin extends Controller
{

    function __construct()
    {
        $this->model = new Model_Admin();
        $this->view = new View();
    }

    function action_index()
    {
        if (isset($_SESSION['admin'])) {
          header('Location: /admin/panel');
          die();
        }
        if (isset($_GET['error'])) {
          $this->view->generate('admin_view.php', 'template_view.php', $_GET['error']);
        } else {
          $this->view->generate('admin_view.php', 'template_view.php');
        }
    }

    function action_panel()
    {
        if (isset($_SESSION['admin'])) {
            $data = $this->model->get_data();
            $this->view->generate('admin_panel_view.php', 'template_view.php', $data);
            die();
        }
        $admins = $this->model->get_admins();

        $is_admin = 0;

        foreach ($admins as $admin)
            foreach ($admin as $key => $value)
                foreach ($_POST as $request_key => $request_value)
                    if ($request_key == $key)
                        if ($request_value == $value)
                            $is_admin++;

        if ($is_admin == 2) {
            $_SESSION['admin'] = $_POST['email'];
            $_SESSION['user'] = $this->model->is_user($_POST['email'], $_POST['password']);;
            $data = $this->model->get_data();
            $this->view->generate('admin_panel_view.php', 'template_view.php', $data);
        } else {
            header('Location: /admin/index?error=Такого админа нет');
        }
    }

    function action_delete()
    {
        $this->ADMIN();
        $table = $_GET['table'];
        $id = $_GET['id'];

        $this->model->delete($table, $id);

        header('Location: /admin/panel');
    }

    function action_add()
    {
      $this->ADMIN();

      $res = $this->model->add($_POST, $_GET, $_FILES);

      header('Location: /admin/panel');
    }

    function action_edit()
    {
      $this->ADMIN();

      $this->model->update($_POST, $_GET, $_FILES);

      header('Location: /admin/panel');
    }

    function action_open_edit()
    {
      $this->ADMIN();
      $row = $this->model->row($_GET['table'], $_GET['id']);
      $row['table'] = $_GET['table'];

      $this->view->generate('admin_edit_view.php', 'template_view.php', $row);
    }

    function action_exit()
    {
      $this->ADMIN();
      unset($_SESSION['admin']);
      header('Location: /admin');
    }
}

<?php
class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
    }

    function ADMIN()
    {
      if (!isset($_SESSION['admin'])) {
        header('Location: /');
        die();
      }
    }
}

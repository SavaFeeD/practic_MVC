<?php


class Controller_News extends Controller
{

    function __construct()
    {
        $this->model = new Model_News();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('news_view.php', 'template_view.php', $data);
    }

    function action_comments()
    {
      $data = $this->model->get_comments($_GET['id']);
      $this->view->generate('news_comments_view.php', 'template_view.php', $data);
    }

    function action_add_comment()
    {
      if (!isset($_SESSION['user'])) {
        header('Location: /');
        die();
      }

      $this->model->add_comment($_POST, $_GET);
      $news = $_POST['news'];
      header("Location: /news/comments?id=$news");
    }

    function action_comment_delete()
    {
      $this->model->delete_comment($_GET['id']);

      $news = $_GET['news'];
      header("Location: /news/comments?id=$news");
    }

    function action_news_delete()
    {
      $this->ADMIN();
      $this->model->delete_news($_GET['id']);

      header("Location: /news");
    }
}

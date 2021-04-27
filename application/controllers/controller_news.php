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

      foreach ($data['comments'] as $key => $comment) {
        $data['comments'][$key]['user'] = $this->model->get_user_name($comment['user'])['name'];
      }

      $this->view->generate('news_comments_view.php', 'template_view.php', $data);
    }

    function action_add_comment()
    {
      if (!isset($_SESSION['user'])) {
        header('Location: /');
        die();
      }

      $cols = array_merge(array_keys($_POST), array_keys($_GET));
      $values = array_merge(array_values($_POST), array_values($_GET));

      foreach ($values as $key => $value) {
        $values[$key] = "'$value'";
      }

      $cols = implode(', ', $cols);
      $values = implode(', ', $values);

      $this->model->add_comment($cols, $values);

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

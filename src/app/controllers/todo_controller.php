<?php
class TodoController
{
  private $model;
  private $authenticated;
  public function __construct(TodoModel $model)
  {
    $this->model = $model;
    $this->authenticated = isset($_SESSION['user_id']);

    // Restrição de acesso - Verifica se o usuário está autenticado
    if (!isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] !== '/login') {
      header('Location: /login');
      exit;
    }
  }

  public function register()
  {
     // Verificar se o usuário já está autenticado
     if ($this->authenticated) {
      header('Location: ../views/layout.php');
      return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
  
      // Verificar se o e-mail já está em uso
      $existingUser = $this->model->getUserByEmail($email);
      if ($existingUser) {
        echo 'Email already in use';
        return;
      }
  
      // Criar um novo usuário
      $this->model->createUser($name, $email, $password);
      header('Location: /login');
      return;
    }
  
    include '../views/register.php';
  }

  public function login()
  {
     // Verificar se o usuário já está autenticado
     if ($this->authenticated) {
      header('Location: ../views/layout.php');
      return;
    }

    // Verificar se o formulário de login foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = $this->model->getUserByEmail($email);

      if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../views/layout.php');
        return;
      }
    }

    include '../views/login.php';
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    header('Location: /');
  }

  public function index()
  {
    // Verificar se o usuário já está autenticado
    if ($this->authenticated) {
      // Usuário autenticado, redirecionar para o dashboard
      header('Location: /dashboard');
      return;
    }

    // Verificar se o usuário já está autenticado
    if (isset($_SESSION['user_id'])) {
      // Usuário autenticado, obter a lista de tarefas específica do usuário
      $userId = $_SESSION['user_id'];
      $todos = $this->model->getAllTodos($userId);

      // Incluir a visualização home.php
      include '../views/home.php';
      return;
    }

    // Usuário não autenticado, redirecionar para a página de login ou cadastro
    include '../views/login-register.php';
  }

  public function add()
  {
     // Verificar se o usuário está autenticado
     if (!$this->authenticated) {
      header('Location: /login');
      return;
    }

    // Obter o ID do usuário atual
    $userId = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $description = $_POST['description'];
      // Adicionar uma nova tarefa para o usuário atual
      $this->model->addTodo($userId, $description);
    }

    header('Location: /');
  }

  public function complete()
  {
     // Verificar se o usuário está autenticado
     if (!$this->authenticated) {
      header('Location: /login');
      return;
    }

    $userId = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $this->model->completeTodo($userId, $id);
    }

    header('Location: /');
  }

  public function delete()
  {
     // Verificar se o usuário está autenticado
     if (!$this->authenticated) {
      header('Location: /login');
      return;
    }

    // Obter o ID do usuário atual
    $userId = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $this->model->deleteTodo($userId, $id);
    }

    header('Location: /');
  }

  public function loginRegister()
  {
    // Verificar se o usuário já está autenticado
    if (isset($_SESSION['user_id'])) {
      // Usuário autenticado, redirecionar para a lista de tarefas
      header('Location: /');
      return;
    }

    // Usuário não autenticado, exibir a página de login e registro
    include '../views/login-register.php';
  }
}
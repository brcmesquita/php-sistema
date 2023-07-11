<!DOCTYPE html>
<html>
  <head>
    <title>Login - Todo App</title>
    <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
    <script src="/public/assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Login</h1>
      <form action="/login" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <title>Todo App - Login/Register</title>
    <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
    <script src="/public/assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Login/Register</h1>

      <div class="row">
        <div class="col-md-6">
          <h3>Login</h3>
          <form action="/login" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>

        <div class="col-md-6">
          <h3>Register</h3>
          <form action="/register" method="POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
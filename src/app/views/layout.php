<!DOCTYPE html>
<html>
  <head>
    <title>Todo App</title>
    <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
    <script src="/public/assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Todo App</h1>
      <form action="/add" method="POST">
        <input type="text" name="description" placeholder="Task description" required>
        <button type="submit" class="btn btn-primary">Add Task</button>
      </form>
      <br>
      <ul class="list-group">
        <?php foreach ($todos as $todo): ?>
          <li class="list-group-item <?php echo $todo['completed'] ? 'list-group-item-success' : ''; ?>">
            <?php echo $todo['description']; ?>
            <?php if (!$todo['completed']): ?>
              <form action="/complete" method="POST" style="display: inline;">
                <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                <button type="submit" class="btn btn-sm btn-success">Complete</button>
              </form>
            <?php endif; ?>
            <form action="/delete" method="POST" style="display: inline;">
              <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
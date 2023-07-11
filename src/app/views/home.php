<!DOCTYPE html>
<html>
  <head>
    <title>Todo App - Home</title>
    <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
    <script src="/public/assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Todo List</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($todos as $todo): ?>
            <tr>
              <td><?php echo htmlspecialchars($todo['description']); ?></td>
              <td><?php echo $todo['completed'] ? 'Completed' : 'Pending'; ?></td>
              <td>
                <?php if (!$todo['completed']): ?>
                  <a href="/complete?id=<?php echo $todo['id']; ?>" class="btn btn-sm btn-success">Complete</a>
                <?php endif; ?>
                <a href="/delete?id=<?php echo $todo['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <form action="/add" method="POST">
        <div class="form-group">
          <input type="text" name="description" class="form-control" placeholder="Enter a new task" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
      </form>
      <a href="/logout" class="btn btn-link">Logout</a>
    </div>
  </body>
</html>
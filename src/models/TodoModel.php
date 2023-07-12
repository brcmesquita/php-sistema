<?php

class TodoModel
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTodos($userId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM todos WHERE user_id = ?');
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTodo($userId, $description)
    {
        $stmt = $this->pdo->prepare('INSERT INTO todos (user_id, description) VALUES (?, ?)');
        $stmt->execute([$userId, $description]);
    }

    public function completeTodo($userId, $todoId)
    {
        $stmt = $this->pdo->prepare('UPDATE todos SET completed = 1 WHERE id = ? AND user_id = ?');
        $stmt->execute([$todoId, $userId]);
    }

    public function deleteTodo($userId, $todoId)
    {
        $stmt = $this->pdo->prepare('DELETE FROM todos WHERE id = ? AND user_id = ?');
        $stmt->execute([$todoId, $userId]);
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $hashedPassword]);
    }
}

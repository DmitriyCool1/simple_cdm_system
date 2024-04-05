<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <form action="add_task.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="deadline">Deadline:</label><br>
        <input type="datetime-local" id="deadline" name="deadline" required><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>

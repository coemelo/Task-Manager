<?php require_once("../../Model/Task.php");

    $title = $_POST["task_title"];
    $description = $_POST["task_description"];

    $task = new Task($title, $description);

    echo "NEED TO LEARN DATABASE AND PDO FOR NOW";
?>
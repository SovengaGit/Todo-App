<?php

namespace App\Interfaces;

interface TodoRepositoryInterface
{
    public function getAllToDoTasks();
    public function getToDoTaskById($taskId);
    public function deleteToDoTask($taskId);
    public function createToDoTask(array $taskDetails);
    public function updateToDoTask($taskId, array $newDetails);
}

<?php

namespace App\Repositories;

use App\Interfaces\TodoRepositoryInterface;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function getAllToDoTasks()
    {
        return Todo::all();
    }
    public function getToDoTaskById($taskId)
    {
        return Todo::findOrFail($taskId);
    }
    public function deleteToDoTask($taskId)
    {
        Todo::destroy($taskId);
    }
    public function createToDoTask(array $taskDetails)
    {
        return Todo::create($taskDetails);
    }
    public function updateToDoTask($taskId, array $newDetails)
    {
        return Todo::whereId($taskId)->update($newDetails);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Interfaces\TodoRepositoryInterface;

class TasksTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_todo_tasks()
    {

        $this->withoutExceptionHandling();

        //Given we have task in the database
        $task = factory('App\Models\Todo')->create();

        //When user visit the tasks page
        $response = $this->get('/todo');

        //He should be able to read the task
        $response->assertSee($task->title);
    }

    /** @test */
    public function a_user_can_read_single_todo_task()
    {
        //Given we have task in the database
        $task = factory('App\Models\Todo')->create();
        //When user visit the task's URI
        $response = $this->get('/todo/' . $task->id);
        //He can see the task details
        $response->assertSee($task->title)
            ->assertSee($task->description);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_task()
    {
        $this->withoutExceptionHandling();
        //Given we have an authenticated user
        $this->actingAs(factory('App\Models\User')->create());
        //And a todo task object
        $task = factory('App\Models\Todo')->make();
        $todoRepository = new TodoRepositoryInterface();
        //When user submits post request to create todo task endpoint
        $this->post('/todo/create', $task->toArray());
        $todoRepository->createToDoTask($task->toArray());
        //It gets stored in the database
        $this->assertEquals(1, Todo::all()->count());
        $this->assertEquals(1, Todo::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_task()
    {
        //And a task object
        $task = factory('App\Models\Todo')->make();
        //When user submits post request to create task endpoint
        $this->post('/todo/create', $task->toArray())
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_task_requires_a_title()
    {

        $this->actingAs(factory('App\Models\User')->create());

        $task = factory('App\Models\Todo')->make(['title' => null]);

        $this->post('/todo/create', $task->toArray())
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_task_requires_a_description()
    {

        $this->actingAs(factory('App\Models\User')->create());

        $task = factory('App\Models\Task')->make(['description' => null]);

        $this->post('/todo/create', $task->toArray())
            ->assertSessionHasErrors('description');
    }

    /** @test */
    public function authorized_user_can_update_the_task()
    {
        //Given we have a signed in user
        $this->actingAs(factory('App\Models\User')->create());
        //And a task which is created by the user
        $task = factory('App\Models\Todo')->create(['user_id' => Auth::id()]);
        $task->title = "Updated Title";
        //When the user hit's the endpoint to update the task
        $this->put('/todo/' . $task->id, $task->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseHas('todo', ['id' => $task->id, 'title' => 'Updated Title']);
    }

    /** @test */
    public function unauthorized_user_cannot_update_the_task()
    {
        //Given we have a signed in user
        $this->actingAs(factory('App\Models\User')->create());
        //And a task which is not created by the user
        $task = factory('App\Models\Todo')->create();
        $task->title = "Updated Title";
        //When the user hit's the endpoint to update the task
        $response = $this->put('/todo/' . $task->id, $task->toArray());
        //We should expect a 403 error
        $response->assertStatus(403);
    }


    /** @test */
    public function authorized_user_can_delete_the_task()
    {

        //Given we have a signed in user
        $this->actingAs(factory('App\Models\User')->create());
        //And a todo task which is created by the user
        $task = factory('App\Models\Task')->create(['user_id' => Auth::id()]);
        //When the user hit's the endpoint to update the task
        $this->delete('/todo/' . $task->id, $task->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseMissing('todo', ['id' => $task->id]);
    }

    /** @test */
    public function unauthorized_user_cannot_delete_the_task()
    {
        //Given we have a signed in user
        $this->actingAs(factory('App\Models\User')->create());
        //And a task which is not created by the user
        $task = factory('App\Models\Todo')->create();
        //When the user hit's the endpoint to update the task
        $response = $this->delete('/todo/' . $task->id, $task->toArray());
        //We should expect a 403 error
        $response->assertStatus(403);
    }
}

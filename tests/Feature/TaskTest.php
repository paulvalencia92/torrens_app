<?php

namespace Tests\Feature;

use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function admin_can_see_all_tasks()
    {

        $admin = factory(User::class)->create(['role' => User::ADMIN]);
        $anotherUser = factory(User::class)->create(['role' => User::USER]);
        $anotherUser2 = factory(User::class)->create(['role' => User::USER]);

        $task = factory(Task::class)->create(['user_id' => $admin->id]);
        $task2 = factory(Task::class)->create(['user_id' => $anotherUser->id]);
        $task3 = factory(Task::class)->create(['user_id' => $anotherUser2->id]);

        $this->actingAs($admin)
            ->get('/tasks')
            ->assertViewHas('tasks', function ($tasks) use ($task, $task2, $task3) {
                return $tasks->contains($task) && $tasks->contains($task2) && $tasks->contains($task3);
            })
            ->assertStatus(200);

    }


    /** @test */
    function non_administrator_users_cannot_see_all_tasks()
    {
        $user = factory(User::class)->create(['role' => User::USER]);
        $anotherUser = factory(User::class)->create(['role' => User::USER]);
        $task1 = factory(Task::class)->create(['user_id' => $user->id]);
        $task2 = factory(Task::class)->create(['user_id' => $anotherUser->id]);

        $this->actingAs($user)
            ->get('/tasks')
            ->assertViewHas('tasks', function ($tasks) use ($task1, $task2) {
                return $tasks->contains($task1) && !$tasks->contains($task2);
            });
    }


    /** @test */
    function it_creates_a_new_task()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post('/tasks', [
                'title' => 'Laravel1',
                'description' => 'Ser el mejor',
                'user_id' => $user->id
            ])->assertRedirect('tasks');

        $this->assertDatabaseHas('tasks', [
            'title' => 'Laravel1',
            'description' => 'Ser el mejor',
            'user_id' => $user->id
        ]);

    }


    /** @test */
    function it_update_a_tasks()
    {
        $user = factory(User::class)->create();
        $task = factory(Task::class)->create(['user_id' => $user->id]);


        $this->actingAs($user)
            ->put("/tasks/{$task->id}", [
                'title' => 'Nuevo titulo',
                'description' => 'Nueva descripcion',
            ])->assertRedirect("/tasks");


        $this->assertDatabaseHas('tasks', [
            'user_id' => $user->id,
            'title' => 'Nuevo titulo',
            'description' => 'Nueva descripcion',
        ]);

    }


    /** @test */
    function it_completely_deletes_a_task()
    {
        $this->markTestIncomplete();

        $user = factory(User::class)->create();
        $task = factory(Task::class)->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->delete("tasks/{$task->id}")
            ->assertRedirect('tasks');

    }


}

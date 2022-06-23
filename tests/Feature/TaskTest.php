<?php

namespace Tests\Feature;

use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
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



    
}

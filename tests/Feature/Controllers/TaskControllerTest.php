<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use App\Models\Label;
use App\Models\TaskStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGuestCannotAccessCreatePage()
    {
        $response = $this->get(route('tasks.create'));
        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanAccessCreatePage()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('tasks.create'));
        $response->assertStatus(200);
    }

    public function testGuestCannotStoreTask()
    {
        $response = $this->post(route('tasks.store'), ['name' => 'New Task']);
        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanStoreTask()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $data = [
            'name' => 'Test Task',
            'status_id' => $status->id,
            'assignee_id' => $user->id,
            'description' => 'Task description',
        ];

        $response = $this->actingAs($user)->post(route('tasks.store'), $data);

        $this->assertDatabaseHas('tasks', ['name' => 'Test Task']);
        $response->assertRedirect(route('tasks.index'));
    }

    public function testUserCanUpdateTask()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['created_by_id' => $user->id]);
        $newData = ['name' => 'Updated Task'];

        $response = $this->actingAs($user)->put(route('tasks.update', $task), $newData);

        $this->assertDatabaseHas('tasks', ['name' => 'Updated Task']);
        $response->assertRedirect(route('tasks.index'));
    }

    public function testUserCanDeleteOwnTask()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['created_by_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('tasks.destroy', $task));

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
        $response->assertRedirect(route('tasks.index'));
    }

    public function testUserCannotDeleteOtherUsersTask()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $task = Task::factory()->create(['created_by_id' => $otherUser->id]);

        $response = $this->actingAs($user)->delete(route('tasks.destroy', $task));

        $response->assertStatus(403);
    }
}

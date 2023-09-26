<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->task = Task::factory()->create();
    }

    public function testCreateTask()
    {
        $this->assertDatabaseHas('tasks', [
            'title' => $this->task->title,
        ]);
    }

    public function testUpdateTask()
    {

        $this->task->update([
            'completed' => true,
        ]);

        $this->assertTrue($this->task->completed);
    }

    public function testDeleteTask()
    {
        $this->task->delete();
        $this->assertDeleted($this->task);
    }
}

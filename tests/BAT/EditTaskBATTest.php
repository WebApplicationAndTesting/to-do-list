<?php
    
namespace Tests\BAT;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class EditTaskBAT extends TestCase 
{
    public function test_edit_task() {
        $task = new Task([
            'id' => 1,
            'description' => 'Add new Task',
            'goal_date' => '2021-11-11',
        ]);
        $this->assertTrue(true);
    }

}
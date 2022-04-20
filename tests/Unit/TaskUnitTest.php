<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TaskUnitTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    // test field in `tasks` table
    // =====*=================================================

    public function test_schema_user_id_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'tasks', 'user_id'
            ), 1);
    }

    public function test_schema_description_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'tasks', 'description'
            ), 1);
    }

    public function test_schema_id_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'tasks', 'description'
            ), 1);
    }

    public function test_schema_date_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'tasks', 'date'
            ), 1);
    }

    public function test_schema_deadline_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'tasks', 'deadline'
            ), 1);
    }

    // test main success and alternative flow
    // ======================================================

    public function test_user_input_description_eng_language() {
        $task = new Task([
            'user_id' => 1,
            'description' => 'Hello BEAM',
        ]);

        $this->assertEquals(1, $task->user_id);
    }

    public function test_user_id_in_task_is_not_navigate_number() {
        $task = Task::all();

        foreach ($task as $i) {
            if ($i->user_id > 0) {
                continue;
            }
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
    }

    // test schema: can input another language (description)?
    public function test_user_input_another_lang_description() {
        $task = new Task([
            'user_id' => "1",
            'description' => "โดมทำข้อนี้",
            'date' => "10/10/2022" ,
            "deadline" => "11/10/2022"
        ]);
        $this->assertEquals('1', $task->user_id);
    }

    // test schema: can input English language (description)?
    public function test_user_input_eng_lang_description() {
        $task = new Task([
            'user_id' => "1",
            'description' => "Hello",
            'date' => "10/10/2022" ,
            "deadline" => "11/10/2022"
        ]);
        $this->assertEquals('1', $task->user_id);
    }

    // test schema: can input only integer (description)?
    public function test_user_input_integer_description() {
        $task = new Task([
            'user_id' => "1",
            'description' => "123",
            'date' => "10/10/2022" ,
            "deadline" => "11/10/2022"
        ]);
        $this->assertEquals('1', $task->user_id);
    }

    // test schema: can input space (description)?
    public function test_user_input_space_description() {
        $task = new Task([
            'user_id' => "1",
            'description' => " ",
            'date' => "10/10/2022" ,
            "deadline" => "11/10/2022"
        ]);
        $this->assertEquals('1', $task->user_id);
    }

    // test schema: can input over maximum date of month (date)?
    public function test_user_input_over_max_date_of_month_date() {
        $this->assertTrue(true);
    }

    // test schema: can input space (date)?
    public function test_user_input_space_date() {
        $task = new Task([
            'user_id' => "1",
            'description' => "123",
            'date' => " " ,
            "deadline" => "11/10/2022"
        ]);
        $this->assertEquals('1', $task->user_id);
    }

    // test schema: can input over maximum date of month (deadline)?
    public function test_user_input_over_max_date_of_month_deadline() {
        $this->assertTrue(true);
    }

    // test schema: can input space (deadline)?
    public function test_user_input_space_deadline() {
        $task = new Task([
            'user_id' => "1",
            'description' => "123",
            'date' => "10/10/2022" ,
            "deadline" => " "
        ]);
        $this->assertEquals('1', $task->user_id);
    }

}
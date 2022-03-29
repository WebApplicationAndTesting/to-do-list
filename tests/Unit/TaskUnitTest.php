<?php

namespace Tests\Unit;


use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TaskUnitTest extends TestCase
{
    // test field in `tasks` table
    // ======================================================

    // test schema: field user_id are correct
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

    // test alternative flow
    // ======================================================

    public function test_user_input_description_eng_language() {
        $task = new Task([
            'user_id' => 1,
            'description' => 'Hello BEAM',
        ]);

        $this->assertEquals(1, $task->user_id);
    }

    // test schema: can input another language?
    // test schema: can input English language?
    // test schema: can input only integer?
    // test schema: user_id is null?
    // test schema: user_id can be minus number?
    // test schema: 
    //



}
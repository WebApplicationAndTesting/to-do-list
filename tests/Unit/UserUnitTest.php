<?php



namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserUnitTest extends TestCase
{
    // test field in `users` table
    // ======================================================


    // test schema: field id are correct
    public function test_schema_id_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'users', 'id'
            ), 1);
    }

    public function test_schema_name_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'users', 'name'
            ), 1);
    }

    public function test_schema_email_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'users', 'email'
            ), 1);
    }

    public function test_schema_password_columns() {
        $this->assertTrue(
            Schema::hasColumn(
                'users', 'password'
            ), 1);
    }

    // test alternative flow
    // ======================================================

    public function test_user_input_name_eng_language() {
        $user = new User([
            'id' => 1,
            'name' => 'Dome',
        ]);

        $this->assertEquals('Dome', $user->name);
    }

    // public function test_user_input_name_thai_language() {
    //     $user = new User([
    //         'id' => 1,
    //         'name' => 'โดม'
    //     ]);

    //     $this->assertEquals();
    // }
    
}

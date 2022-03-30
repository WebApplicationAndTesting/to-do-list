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
    use WithFaker, RefreshDatabase;
    // test field in `users` table
    // ======================================================

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

    // test main success and alternative flow
    // ======================================================

    public function test_user_input_name_eng_language() {
        $user = new User([
            'id' => 1,
            'name' => 'Dome',
        ]);

        $this->assertEquals('Dome', $user->name);
    }

    public function test_user_input_name_other_language() {
        $user = new User([
            'id' => 1,
            'email' => 'โดม@gmail.com',
        ]);

        $this->assertEquals('โดม@gmail.com', $user->email);
    }

    public function test_create_user_in_database() {
        User::factory()->create([
            'email' => 'beam@gmail.com'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'beam@gmail.com']);
    }

    public function test_model_miss() {
        $user=User::factory()->create();
        $user->delete();
        $this->assertModelMissing($user);
    }

    public function test_name_attribute_less_than_41_char() {
        $user = User::all();

        foreach ($user as $i) {
            if ($i->name <= 40) {
                continue;
            }
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
    }

    // public function test_user_input_name_thai_language() {
    //     $user = new User([
    //         'id' => 1,
    //         'name' => 'โดม'
    //     ]);

    //     $this->assertEquals();
    // }


    // test schema: can input another language (username)?
    // test schema: can input English language (username)?

    // test schema: can input only integer (username)?
    // public function test_user_input_name_only_integer(){
    //     $user = new User([
    //         'id' => 1,
    //         'name' => '12345',

    //     ]);

    //     $this->assertEquals('12345', $user->name);
    // }

    // test schema: can input space (username)?
    public function test_user_input_space(){
        $user = new User([
            'id' => 1,
            'name' => 'Do me',
        ]);
        $this->assertEquals('Do me', $user->name);
    }

    // test schema: can input another language (password)?
    // test schema: can input English language (password)?

    // test schema: can input only integer (password)?
    // public function test_user_input_password_only_integer(){
    //     $user = new User([
    //         'id' => 1,
    //         'password' => "12345"

    //     ]);

    //     $this->assertEquals('12345', $user->password);
    // }

    // test schema: can input space (password)?
    // test schema: can input another language (email)?
    // test schema: can input English language (email)?
    // test schema: can input only integer (email)?
    // test schema: can input space (email)?
    // test schema: can input another word (not .com) (email)?
    // test schema: can input another word (not @gmail ex. @beam.com) (email)?
    
    
}

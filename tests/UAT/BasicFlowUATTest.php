<?php

namespace Tests\UAT;

use App\Models\Task;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\User;

class BasicFlowUAT extends TestCase {

    use WithFaker, RefreshDatabase;

    public function test_add_task() {
        $this->assertTrue(true);
    }

    public function test_user_have_zero_test() {
        $this->assertTrue(true);
    }

    // add task success
    public function test_add_task_success() {
        $task = new Task([
            'user_id' => 1,
            'description' => 'Test add test to todolist',
        ]);
        $this -> assertEquals('Test add test to todolist', $task -> description);
    }

    // edited task
    public function test_edited_task() {

    }

    // deleted task
    public function test_deleted_task() {
        $task = new Task([
            'user_id' => 1,
            'description' => 'Test add test to todolist',
        ]);

        $this->delete('/tasks/'.$task->id);
        $this->assertDatabaseMissing('tasks',['id'=> $task->id]);
    }

    // regis
    public function test_regis() {
        $response = $this->post('/register', [
            'name' => 'dome',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    // login
    public function test_login() {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    // change name
    public function test_change_name() {

    }

    // change password
    public function test_change_password() {

    }

    // change email
    public function test_change_email() {

    }

    // logout
    public function test_logout() {

    }


}
<?php

namespace Tests\Integration;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTaskIntegrationTest extends TestCase {

    use WithFaker, RefreshDatabase;

    // User have 0 test
    public function test_user_have_zero_task() {
        $this->assertTrue(true);
    }

    // User have 999 test
    public function test_user_have_999_task() {
        $this->assertTrue(true);
    }

    // Task are owned by 2 users.
    public function test_task_owned_by_2_users() {
        $this->assertTrue(true);
    }

    // Task deleted by user
    public function test_task_deleted_by_user() {
        $this->assertTrue(true);
    }

    // Task created by user
    public function test_task_created_by_user() {
        $this->assertTrue(true);
    }

    // Task edited by user
    public function test_task_edited_by_user() {
        $this->assertTrue(true);
    }

    //


}
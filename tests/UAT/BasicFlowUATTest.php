<?php

namespace Tests\UAT;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BasicFlowUAT extends TestCase {

    use WithFaker, RefreshDatabase;

    public function test_add_task() {
        $this->assertTrue(true);
    }

    public function test_user_have_zero_test() {
        $this->assertTrue(true);
    }
    // add task success
    // edited task
    // deleted task
    // regis
    // login
    // change name
    // change password
    // change email
    // logout

}
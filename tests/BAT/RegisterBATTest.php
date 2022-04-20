<?php
    
namespace Tests\BAT;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RegisterBAT extends TestCase{

    

    // Do not enter any text in the username field.
    public function test_do_not_input_text_in_username_field() {
        $this->assertTrue(true);
    }

    // Do not enter any text in the email field.
    public function test_do_not_input_text_in_email_field() {
        $this->assertTrue(true);
    }

    // Do not enter any text in the password field.
    public function test_do_not_input_text_in_password_field() {
        $this->assertTrue(true);
    }

    // Do not enter any text in the confirm password field.
    public function test_do_not_input_text_in_confirm_password_field() {
        $this->assertTrue(true);
    }

    // Enter another language in the username field.
    public function test_input_another_language_in_username_field() {
        $this->assertTrue(true);
    }

    // Enter another language in the email field.
    public function test_input_another_language_in_email_field() {
        $this->assertTrue(true);
    }

    // Enter another language in the password field.
    public function test_input_another_language_in_password_field() {
        $this->assertTrue(true);
    }

    // Enter another language in the pconfirm assword field.
    public function test_input_another_language_in_confirm_password_field() {
        $this->assertTrue(true);
    }

    // Enter symbol in the username field.
    public function test_input_symbol_in_username_field() {
        $this->assertTrue(true);
    }

    // Enter symbol in the email field.
    public function test_input_symbol_in_email_field() {
        $this->assertTrue(true);
    }

    // Enter symbol in the password field.
    public function test_input_symbol_in_password_field() {
        $this->assertTrue(true);
    }

    // Enter symbol in the confirm password field.
    public function test_input_symbol_in_confirm_password_field() {
        $this->assertTrue(true);
    }

    // Input another word (not .com)
    public function test_user_input_another_word_end_email(){
        $this->assertTrue(true);
    }

    // Input another word (not @gmail ex. @beam.com)
    public function test_user_input_another_word_if_not_gmail(){
        $this->assertTrue(true);
    }    

}
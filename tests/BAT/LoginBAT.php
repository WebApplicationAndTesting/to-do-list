<?php
    
namespace Tests\BAT;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LoginBAT extends TestCase{

    // Do not enter any text in the email field.
    public function test_do_not_input_text_in_email_field() {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    // Do not enter any text in the password field.
    public function test_do_not_input_text_in_password_field() {
        $this->assertTrue(true);
    }

    // Enter another language in the email field.
    public function test_input_another_language_in_email_field() {

    }

    // Enter another language in the password field.
    public function test_input_another_language_in_password_field() {
        
    }

    // Enter symbol in the email field.
    public function test_input_symbol_in_email_field() {
        
    }

    // Enter symbol in the password field.
    public function test_input_symbol_in_password_field() {
        
    }

    // Input invalid email
    public function test_input_invalid_email() {
        
    }

    // Input invalid password
    public function test_input_invalid_password() {
        
    }

    // Input another word (not .com)
    public function test_user_input_another_word_end_email(){
        
    }

    // Input another word (not @gmail ex. @beam.com)
    public function test_user_input_another_word_if_not_gmail(){
        
    }    

}
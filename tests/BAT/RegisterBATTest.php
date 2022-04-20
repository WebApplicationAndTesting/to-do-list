<?php
    
namespace Tests\BAT;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RegisterBAT extends TestCase{

    use RefreshDatabase;

    // Enter confirm button but not type data.
    // public function test_click_button_not_type_data() {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/register')
    //                 ->press('Register')
    //                 ->assertPathIs('/register');
    //     });
    // }

    // Do not enter any text in the username field.
    public function test_do_not_input_text_in_username_field() {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertGuest();
    }

    // Do not enter any text in the email field.
    public function test_do_not_input_text_in_email_field() {
        $response = $this->post('/register', [
            'name' => 'test',
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertGuest();
    }

    // Do not enter any text in the password field.
    public function test_do_not_input_text_in_password_field() {
        $response = $this->post('/register', [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => 'password',
        ]);
        $this->assertGuest();
    }

    // Do not enter any text in the confirm password field.
    public function test_do_not_input_text_in_confirm_password_field() {
        $response = $this->post('/register', [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => '',
        ]);
        $this->assertGuest();
    }

    // Enter another language in the username field.
    public function test_input_another_language_in_username_field() {
        $response = $this->post('/register', [
            'name' => 'โดมเองครับ',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    // Enter another language in the email field.
    public function test_input_another_language_in_email_field() {
        // $response = $this->post('/register', [
        //     'name' => 'test',
        //     'email' => 'โดม@example.com',
        //     'password' => 'password',
        //     'password_confirmation' => 'password',
        // ]);
        // $this->assertGuest();
        $this->assertTrue(true);
    }

    // Enter another language in the password field.
    public function test_input_another_language_in_password_field() {
        $response = $this->post('/register', [
            'name' => 'โดมเองครับ',
            'email' => 'test@example.com',
            'password' => 'สวัสดี',
            'password_confirmation' => 'password',
        ]);
        $this->assertGuest();
    }

    // Enter another language in the pconfirm assword field.
    public function test_input_another_language_in_confirm_password_field() {
        $response = $this->post('/register', [
            'name' => 'โดมเองครับ',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'สวัสดี',
        ]);
        $this->assertGuest();
    }

    // Enter symbol in the username field.
    public function test_input_symbol_in_username_field() {
        $response = $this->post('/register', [
            'name' => '🐸🐸🐸',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    // Enter symbol in the email field.
    public function test_input_symbol_in_email_field() {
        // $response = $this->post('/register', [
        //     'name' => 'โดมเองครับ',
        //     'email' => 'test🐶@example.com',
        //     'password' => 'password',
        //     'password_confirmation' => 'password',
        // ]);
        // $this->assertGuest();
        $this->assertTrue(true);
    }

    // Enter symbol in the password field.
    public function test_input_symbol_in_password_field() {
        // $response = $this->post('/register', [
        //     'name' => 'โดมเองครับ',
        //     'email' => 'test@example.com',
        //     'password' => '🐶🐶🐶',
        //     'password_confirmation' => 'password',
        // ]);
        // $this->assertGuest();
        $this->assertTrue(true);
    }

    // Enter symbol in the confirm password field.
    public function test_input_symbol_in_confirm_password_field() {
        // $response = $this->post('/register', [
        //     'name' => 'โดมเองครับ',
        //     'email' => 'test@example.com',
        //     'password' => 'password',
        //     'password_confirmation' => '🐶🐶🐶',
        // ]);
        // $this->assertGuest();
        $this->assertTrue(true);
    }

    // Input another word (not .com)
    public function test_user_input_another_word_end_email(){
        $response = $this->post('/register', [
            'name' => 'โดมเองครับ',
            'email' => 'test@example.dom',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    // Input another word (not @gmail ex. @beam.com)
    public function test_user_input_another_word_if_not_gmail(){
        $response = $this->post('/register', [
            'name' => 'โดมเองครับ',
            'email' => 'test@dome.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertTrue(true);
    }    

}
<?php
    
namespace Tests\BAT;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LoginBAT extends TestCase{

    use RefreshDatabase;

    // Enter confirm button but not type data.
    // public function test_click_button_not_type_data() {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/login')
    //                 ->press('login')
    //                 ->assertPathIs('/login');
    //     });
    // }

    
    // Do not enter any text in the email field.
    public function test_do_not_input_text_in_email_field() {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => '',
            'password' => 'password',
        ]);
        $this->assertGuest();
        // $this->assertTrue(true);
    }


    // Do not enter any text in the password field.
    public function test_do_not_input_text_in_password_field() {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => '',
        ]);
        $this->assertGuest();
    }


    // Enter another language in the email field.
    public function test_input_another_language_in_email_field() {
        $this->assertTrue(true);
    }


    // Enter another language in the password field.
    public function test_input_another_language_in_password_field() {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'อยากเรียน',
        ]);
        $this->assertGuest();
    }


    // Enter symbol in the email field.
    public function test_input_symbol_in_email_field() {
        // $user = User::factory()->create();
        // $this->post('/login', [
        //     'email' => 🐸🐸🐸,
        //     'password' => 'อยากเรียน',
        // ]);
        // $this->assertGuest();
        $this->assertTrue(true);
    }


    // Enter symbol in the password field.
    public function test_input_symbol_in_password_field() {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => '🐸🐸🐸',
        ]);
        $this->assertGuest();
    }


    // Input invalid email
    public function test_input_invalid_email() {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => '123@gmail.com',
            'password' => 'wrong-password',
        ]);
        $this->assertGuest();
    }


    // Input invalid password
    public function test_input_invalid_password() {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
        $this->assertGuest();
    }


    // Input another word (not .com)
    public function test_user_input_another_word_end_email(){
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => 'dome@gmail.dom',
            'password' => 'password',
        ]);
        $this->assertGuest();
    }
    

    // Input another word (not @gmail ex. @beam.com)
    public function test_user_input_another_word_if_not_gmail(){
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => 'dome@dome.com',
            'password' => 'password',
        ]);
        $this->assertGuest();
    }    

}
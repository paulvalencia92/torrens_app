<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function user_authenticated_see_users()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get('/users')
            ->assertStatus(200);
    }

    /** @test */
    public function guest_user_cannot_see_users()
    {
        $this->get('/users')
            ->assertRedirect('login');
    }


    /** @test */
    function it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post('/users', [
                'name' => 'Carlos',
                'email' => 'carlos@gmail.com',
                'password' => 'Passw0rd',
                'password_confirmation' => 'Passw0rd',
                'phone_number' => '3188308972',
                'role' => User::USER,
                'status' => '1',
            ])->assertRedirect('users');

    }












}

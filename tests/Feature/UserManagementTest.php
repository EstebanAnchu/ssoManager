<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_index_is_only_available_for_authenticated_users(): void
    {
        $this->get('/users')->assertRedirect('/login');
    }

    public function test_authenticated_user_can_create_users(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->post('/users', [
            'name' => 'Nuevo Usuario',
            'email' => 'nuevo@example.com',
            'account_type' => 'business',
            'password' => 'Password1',
            'password_confirmation' => 'Password1',
        ]);

        $response->assertRedirect('/users');
        $this->assertDatabaseHas('users', [
            'email' => 'nuevo@example.com',
            'account_type' => 'business',
        ]);
    }

    public function test_authenticated_user_can_view_and_search_users(): void
    {
        $admin = User::factory()->create();
        User::factory()->create(['name' => 'Cliente Visible', 'email' => 'visible@example.com']);
        User::factory()->create(['name' => 'Otra Persona', 'email' => 'otra@example.com']);

        $this->actingAs($admin)
            ->get('/users')
            ->assertOk()
            ->assertSee('Listado');

        $this->actingAs($admin)
            ->get('/users?search=Visible', ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertSee('Cliente Visible')
            ->assertDontSee('Otra Persona');
    }

    public function test_authenticated_user_can_update_users(): void
    {
        $admin = User::factory()->create();
        $user = User::factory()->create(['account_type' => 'business']);

        $response = $this->actingAs($admin)->put("/users/{$user->id}", [
            'name' => 'Usuario Editado',
            'email' => 'editado@example.com',
            'account_type' => 'operator',
        ]);

        $response->assertRedirect('/users');
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Usuario Editado',
            'email' => 'editado@example.com',
            'account_type' => 'operator',
        ]);
    }

    public function test_user_with_id_one_cannot_be_deleted(): void
    {
        $protectedUser = User::factory()->create(['id' => 1]);
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->delete("/users/{$protectedUser->id}");

        $response->assertRedirect('/users');
        $this->assertDatabaseHas('users', ['id' => 1]);
    }

    public function test_users_can_be_deleted_except_id_one(): void
    {
        $admin = User::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($admin)->delete("/users/{$user->id}")->assertRedirect('/users');

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}

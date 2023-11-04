<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{

    public function testCategoryCanBeCreated()
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        $categoryData = [
            'name' => 'Test Category',
        ];

        $response = $this->post('admin/categories', $categoryData);

        $response->assertStatus($response->status(), 302); // 302: Found
        $this->assertDatabaseHas('categories', ['name' => 'Test Category']);
    }

    /*public function testCategoryNameIsRequired()
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);
        $categoryData = [
             'name' => '', // Uncomment this line to test validation error
        ];

        $response = $this->post('admin/categories', $categoryData);
        $response->assertStatus(422); // 422: Unprocessable Entity
        $response->assertJsonValidationErrors('name');
    }*/
}

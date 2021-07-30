<?php

namespace Tests\Feature;

use App\Models\Advert;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AdvertTest extends TestCase
{
    public function test_index()
    {
        $response = $this->get('/adverts');
        $response->assertStatus(200);
    }

    public function test_index_slug()
    {
        $slug = 'test_slug';
        $category = Category::factory()->create([
            'slug' => $slug
        ]);

        Advert::factory()->create([
            'category_id' => $category->id
        ]);

        $response = $this->get(route('categories.filter', ['category' => $slug]));
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(
            '/adverts',
            [
                'title' => 'test',
                'subtitle' => 'subtitle',
                'description' => 'test',
                'price' => 123,
                'category_id' => Category::factory()->create()->id,
            ]
        );

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    public function test_store_fail()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(
            '/adverts',
            [
                //
            ]
        );

        $response->assertSessionHasErrors();
        $response->assertStatus(302);
    }

    public function test_update()
    {
        $user = User::factory()->create();
        $advert = Advert::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->put(
            '/adverts/' . $advert->id,
            [
                'title' => 'updated title',
                'subtitle' => 'updated subtitle',
                'description' => 'updated description',
                'price' => 123,
            ]
        );

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    public function test_update_fail()
    {
        $user = User::factory()->create();
        $advert = Advert::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->put(
            '/adverts/' . $advert->id,
            [
                //
            ]
        );

        $response->assertSessionHasErrors();
        $response->assertStatus(302);
    }

    public function test_delete()
    {
        $user = User::factory()->create();
        $advert = Advert::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->delete('/adverts/' . $advert->id);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    public function test_delete_fail()
    {
        $user = User::factory()->create();
        $advert = Advert::factory()->create();
        $response = $this->actingAs($user)->delete('/adverts/' . $advert->id);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(403);
    }
}

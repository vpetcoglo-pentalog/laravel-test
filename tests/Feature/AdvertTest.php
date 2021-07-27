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

    public function test_store()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(
            '/adverts',
            [
                'title' => 'test',
                'description' => 'test',
                'price' => 123,
                'category_id' => Category::factory()->create()->id,
            ]
        );

        $response->assertSessionHasNoErrors();
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
                'description' => 'updated description',
                'price' => 123,
            ]
        );

        $response->assertSessionHasNoErrors();
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
}

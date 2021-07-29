<?php

namespace Tests\Feature;

use App\Models\Advert;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CommentTest extends TestCase
{
    public function test_comment_store()
    {
        $user = User::factory()->create();
        $advert = Advert::factory()->create();

        $response = $this->actingAs($user)->post('/adverts/' . $advert->id . '/comments', [
            'body' => 'comment body'
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('comments', [
            'advert_id' => $advert->id,
            'body' => 'comment body'
        ]);
        $response->assertStatus(302);
    }

    public function test_comment_store_fail()
    {
        $user = User::factory()->create();
        $advert = Advert::factory()->create();

        // Check Authorization
        $response = $this->post('/adverts/' . $advert->id . '/comments', [
            'body' => 'comment body'
        ]);

        $response->assertStatus(403);

        // Check request validation
        $response = $this->actingAs($user)->post('/adverts/' . $advert->id . '/comments', [
            //
        ]);

        $response->assertSessionHasErrors();
        $response->assertStatus(302);
    }

    public function test_comment_delete()
    {
        $user = User::factory()->create();
        $advert = Advert::factory()->create();

        $this->actingAs($user)->post('/adverts/' . $advert->id . '/comments', [
            'body' => 'comment body'
        ]);

        $response = $this->actingAs($user)->delete('/comments/' . $advert->comments[0]->id);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    public function test_comment_delete_fail()
    {
        $user = User::factory()->create();
        $advert = Advert::factory()->create();

        $this->actingAs($user)->post('/adverts/' . $advert->id . '/comments', [
            'body' => 'comment body'
        ]);

        //
        $user2 = User::factory()->create();
        $response = $this->actingAs($user2)->delete('/comments/' . $advert->comments[0]->id);

        $response->assertStatus(403);
    }
}

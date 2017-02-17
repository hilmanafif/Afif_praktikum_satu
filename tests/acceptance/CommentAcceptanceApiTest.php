<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->comment = factory(App\Models\Comment::class)->make([
            'id' => '1',
		'content_id' => 'laravel',
		'name' => 'laravel',
		'email' => 'laravel',
		'body' => 'I am Batman',
		'status' => 'laravel',

        ]);
        $this->commentEdited = factory(App\Models\Comment::class)->make([
            'id' => '1',
		'content_id' => 'laravel',
		'name' => 'laravel',
		'email' => 'laravel',
		'body' => 'I am Batman',
		'status' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/comments');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/comments', $this->comment->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/comments', $this->comment->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/comments/1', $this->commentEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('comments', $this->commentEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/comments', $this->comment->toArray());
        $response = $this->call('DELETE', 'api/v1/comments/'.$this->comment->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'comment was deleted']);
    }

}

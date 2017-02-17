<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->comment = factory(_namespace_repository_\Comment::class)->make([
            'id' => '1',
		'content_id' => 'laravel',
		'name' => 'laravel',
		'email' => 'laravel',
		'body' => 'I am Batman',
		'status' => 'laravel',

        ]);
        $this->commentEdited = factory(_namespace_repository_\Comment::class)->make([
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
        $response = $this->actor->call('GET', 'comments');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('comments');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'comments/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'comments', $this->comment->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('comments/'.$this->comment->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'comments', $this->comment->toArray());

        $response = $this->actor->call('GET', '/comments/'.$this->comment->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('comment');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'comments', $this->comment->toArray());
        $response = $this->actor->call('PATCH', 'comments/1', $this->commentEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('comments', $this->commentEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'comments', $this->comment->toArray());

        $response = $this->call('DELETE', 'comments/'.$this->comment->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('comments');
    }

}

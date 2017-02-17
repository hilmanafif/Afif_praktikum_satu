<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContentAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->content = factory(_namespace_repository_\Content::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'quote' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'offline_writer_id' => '1',
		'offline_writer' => 'laravel',
		'category_id' => '1',
		'topic_id' => '1',
		'status' => 'laravel',

        ]);
        $this->contentEdited = factory(_namespace_repository_\Content::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'quote' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'offline_writer_id' => '1',
		'offline_writer' => 'laravel',
		'category_id' => '1',
		'topic_id' => '1',
		'status' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'contents');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('contents');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'contents/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'contents', $this->content->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('contents/'.$this->content->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'contents', $this->content->toArray());

        $response = $this->actor->call('GET', '/contents/'.$this->content->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('content');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'contents', $this->content->toArray());
        $response = $this->actor->call('PATCH', 'contents/1', $this->contentEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('contents', $this->contentEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'contents', $this->content->toArray());

        $response = $this->call('DELETE', 'contents/'.$this->content->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('contents');
    }

}

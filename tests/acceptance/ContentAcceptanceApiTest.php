<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContentAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->content = factory(App\Models\Content::class)->make([
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
        $this->contentEdited = factory(App\Models\Content::class)->make([
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
        $response = $this->actor->call('GET', 'api/v1/contents');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/contents', $this->content->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/contents', $this->content->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/contents/1', $this->contentEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('contents', $this->contentEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/contents', $this->content->toArray());
        $response = $this->call('DELETE', 'api/v1/contents/'.$this->content->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'content was deleted']);
    }

}

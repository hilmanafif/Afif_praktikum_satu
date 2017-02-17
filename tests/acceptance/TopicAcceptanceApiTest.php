<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TopicAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->topic = factory(App\Models\Topic::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'status' => 'laravel',

        ]);
        $this->topicEdited = factory(App\Models\Topic::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'status' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/topics');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/topics', $this->topic->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/topics', $this->topic->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/topics/1', $this->topicEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('topics', $this->topicEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/topics', $this->topic->toArray());
        $response = $this->call('DELETE', 'api/v1/topics/'.$this->topic->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'topic was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TopicAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->topic = factory(_namespace_repository_\Topic::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'status' => 'laravel',

        ]);
        $this->topicEdited = factory(_namespace_repository_\Topic::class)->make([
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
        $response = $this->actor->call('GET', 'topics');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('topics');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'topics/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'topics', $this->topic->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('topics/'.$this->topic->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'topics', $this->topic->toArray());

        $response = $this->actor->call('GET', '/topics/'.$this->topic->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('topic');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'topics', $this->topic->toArray());
        $response = $this->actor->call('PATCH', 'topics/1', $this->topicEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('topics', $this->topicEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'topics', $this->topic->toArray());

        $response = $this->call('DELETE', 'topics/'.$this->topic->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('topics');
    }

}

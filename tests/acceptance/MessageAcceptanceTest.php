<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MessageAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->message = factory(_namespace_repository_\Message::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'message' => 'I am Batman',
		'sender_id' => '1',
		'receiver_id' => '1',
		'status' => 'laravel',

        ]);
        $this->messageEdited = factory(_namespace_repository_\Message::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'message' => 'I am Batman',
		'sender_id' => '1',
		'receiver_id' => '1',
		'status' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'messages');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('messages');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'messages/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'messages', $this->message->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('messages/'.$this->message->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'messages', $this->message->toArray());

        $response = $this->actor->call('GET', '/messages/'.$this->message->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('message');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'messages', $this->message->toArray());
        $response = $this->actor->call('PATCH', 'messages/1', $this->messageEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('messages', $this->messageEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'messages', $this->message->toArray());

        $response = $this->call('DELETE', 'messages/'.$this->message->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('messages');
    }

}

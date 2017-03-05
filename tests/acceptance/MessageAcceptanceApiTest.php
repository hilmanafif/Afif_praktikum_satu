<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MessageAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->message = factory(App\Models\Message::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'message' => 'I am Batman',
		'sender_id' => '1',
		'receiver_id' => '1',
		'status' => 'laravel',

        ]);
        $this->messageEdited = factory(App\Models\Message::class)->make([
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
        $response = $this->actor->call('GET', 'api/v1/messages');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/messages', $this->message->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/messages', $this->message->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/messages/1', $this->messageEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('messages', $this->messageEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/messages', $this->message->toArray());
        $response = $this->call('DELETE', 'api/v1/messages/'.$this->message->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'message was deleted']);
    }

}

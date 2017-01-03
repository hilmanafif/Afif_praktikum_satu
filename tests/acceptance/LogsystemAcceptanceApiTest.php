<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogsystemAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->logsystem = factory(App\Models\Logsystem::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'ipaddress' => 'laravel',
		'user_id' => '1',

        ]);
        $this->logsystemEdited = factory(App\Models\Logsystem::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'ipaddress' => 'laravel',
		'user_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/logsystems');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/logsystems', $this->logsystem->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/logsystems', $this->logsystem->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/logsystems/1', $this->logsystemEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('logsystems', $this->logsystemEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/logsystems', $this->logsystem->toArray());
        $response = $this->call('DELETE', 'api/v1/logsystems/'.$this->logsystem->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'logsystem was deleted']);
    }

}

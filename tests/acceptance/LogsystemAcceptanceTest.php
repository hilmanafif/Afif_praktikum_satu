<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogsystemAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->logsystem = factory(_namespace_repository_\Logsystem::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'ipaddress' => 'laravel',
		'user_id' => '1',

        ]);
        $this->logsystemEdited = factory(_namespace_repository_\Logsystem::class)->make([
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
        $response = $this->actor->call('GET', 'logsystems');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('logsystems');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'logsystems/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'logsystems', $this->logsystem->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('logsystems/'.$this->logsystem->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'logsystems', $this->logsystem->toArray());

        $response = $this->actor->call('GET', '/logsystems/'.$this->logsystem->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('logsystem');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'logsystems', $this->logsystem->toArray());
        $response = $this->actor->call('PATCH', 'logsystems/1', $this->logsystemEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('logsystems', $this->logsystemEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'logsystems', $this->logsystem->toArray());

        $response = $this->call('DELETE', 'logsystems/'.$this->logsystem->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('logsystems');
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OfflineWriterAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->offlinewriter = factory(_namespace_repository_\OfflineWriter::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'twitter' => 'laravel',
		'email' => 'laravel',
		'phone' => 'laravel',

        ]);
        $this->offlinewriterEdited = factory(_namespace_repository_\OfflineWriter::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'twitter' => 'laravel',
		'email' => 'laravel',
		'phone' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'offlinewriters');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('offlinewriters');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'offlinewriters/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'offlinewriters', $this->offlinewriter->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('offlinewriters/'.$this->offlinewriter->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'offlinewriters', $this->offlinewriter->toArray());

        $response = $this->actor->call('GET', '/offlinewriters/'.$this->offlinewriter->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('offlinewriter');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'offlinewriters', $this->offlinewriter->toArray());
        $response = $this->actor->call('PATCH', 'offlinewriters/1', $this->offlinewriterEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('offlinewriters', $this->offlinewriterEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'offlinewriters', $this->offlinewriter->toArray());

        $response = $this->call('DELETE', 'offlinewriters/'.$this->offlinewriter->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('offlinewriters');
    }

}

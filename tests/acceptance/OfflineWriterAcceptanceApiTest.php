<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OfflineWriterAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->offlinewriter = factory(App\Models\OfflineWriter::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'twitter' => 'laravel',
		'email' => 'laravel',
		'phone' => 'laravel',

        ]);
        $this->offlinewriterEdited = factory(App\Models\OfflineWriter::class)->make([
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
        $response = $this->actor->call('GET', 'api/v1/offlinewriters');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/offlinewriters', $this->offlinewriter->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/offlinewriters', $this->offlinewriter->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/offlinewriters/1', $this->offlinewriterEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('offlinewriters', $this->offlinewriterEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/offlinewriters', $this->offlinewriter->toArray());
        $response = $this->call('DELETE', 'api/v1/offlinewriters/'.$this->offlinewriter->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'offlinewriter was deleted']);
    }

}

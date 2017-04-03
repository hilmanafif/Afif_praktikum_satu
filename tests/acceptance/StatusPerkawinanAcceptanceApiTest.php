<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusPerkawinanAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->statusperkawinan = factory(App\Models\StatusPerkawinan::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->statusperkawinanEdited = factory(App\Models\StatusPerkawinan::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/statusperkawinans');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/statusperkawinans', $this->statusperkawinan->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/statusperkawinans', $this->statusperkawinan->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/statusperkawinans/1', $this->statusperkawinanEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('statusperkawinans', $this->statusperkawinanEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/statusperkawinans', $this->statusperkawinan->toArray());
        $response = $this->call('DELETE', 'api/v1/statusperkawinans/'.$this->statusperkawinan->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'statusperkawinan was deleted']);
    }

}

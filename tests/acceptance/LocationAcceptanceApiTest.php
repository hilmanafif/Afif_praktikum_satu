<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LocationAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->location = factory(App\Models\Location::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'address' => 'laravel',
		'city' => 'laravel',
		'lat' => '1.1',
		'long' => '1.1',
		'company_id' => '1',
		'timezone_id' => '1',

        ]);
        $this->locationEdited = factory(App\Models\Location::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'address' => 'laravel',
		'city' => 'laravel',
		'lat' => '1.1',
		'long' => '1.1',
		'company_id' => '1',
		'timezone_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/locations');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/locations', $this->location->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/locations', $this->location->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/locations/1', $this->locationEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('locations', $this->locationEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/locations', $this->location->toArray());
        $response = $this->call('DELETE', 'api/v1/locations/'.$this->location->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'location was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LocationAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->location = factory(_namespace_repository_\Location::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'address' => 'laravel',
		'city' => 'laravel',
		'lat' => '1.1',
		'long' => '1.1',
		'company_id' => '1',
		'timezone_id' => '1',

        ]);
        $this->locationEdited = factory(_namespace_repository_\Location::class)->make([
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
        $response = $this->actor->call('GET', 'locations');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('locations');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'locations/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'locations', $this->location->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('locations/'.$this->location->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'locations', $this->location->toArray());

        $response = $this->actor->call('GET', '/locations/'.$this->location->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('location');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'locations', $this->location->toArray());
        $response = $this->actor->call('PATCH', 'locations/1', $this->locationEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('locations', $this->locationEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'locations', $this->location->toArray());

        $response = $this->call('DELETE', 'locations/'.$this->location->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('locations');
    }

}

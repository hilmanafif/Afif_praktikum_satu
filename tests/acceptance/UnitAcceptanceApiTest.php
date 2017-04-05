<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UnitAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->unit = factory(App\Models\Unit::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',

        ]);
        $this->unitEdited = factory(App\Models\Unit::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/units');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/units', $this->unit->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/units', $this->unit->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/units/1', $this->unitEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('units', $this->unitEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/units', $this->unit->toArray());
        $response = $this->call('DELETE', 'api/v1/units/'.$this->unit->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'unit was deleted']);
    }

}

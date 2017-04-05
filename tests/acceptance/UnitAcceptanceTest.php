<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UnitAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->unit = factory(_namespace_repository_\Unit::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',

        ]);
        $this->unitEdited = factory(_namespace_repository_\Unit::class)->make([
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
        $response = $this->actor->call('GET', 'units');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('units');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'units/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'units', $this->unit->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('units/'.$this->unit->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'units', $this->unit->toArray());

        $response = $this->actor->call('GET', '/units/'.$this->unit->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('unit');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'units', $this->unit->toArray());
        $response = $this->actor->call('PATCH', 'units/1', $this->unitEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('units', $this->unitEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'units', $this->unit->toArray());

        $response = $this->call('DELETE', 'units/'.$this->unit->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('units');
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WilayahAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->wilayah = factory(_namespace_repository_\Wilayah::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'address' => 'laravel',

        ]);
        $this->wilayahEdited = factory(_namespace_repository_\Wilayah::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'address' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'wilayahs');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('wilayahs');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'wilayahs/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'wilayahs', $this->wilayah->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('wilayahs/'.$this->wilayah->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'wilayahs', $this->wilayah->toArray());

        $response = $this->actor->call('GET', '/wilayahs/'.$this->wilayah->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('wilayah');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'wilayahs', $this->wilayah->toArray());
        $response = $this->actor->call('PATCH', 'wilayahs/1', $this->wilayahEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('wilayahs', $this->wilayahEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'wilayahs', $this->wilayah->toArray());

        $response = $this->call('DELETE', 'wilayahs/'.$this->wilayah->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('wilayahs');
    }

}

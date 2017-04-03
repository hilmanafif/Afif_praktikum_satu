<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusPegawaiAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->statuspegawai = factory(_namespace_repository_\StatusPegawai::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->statuspegawaiEdited = factory(_namespace_repository_\StatusPegawai::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'statuspegawais');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('statuspegawais');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'statuspegawais/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'statuspegawais', $this->statuspegawai->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('statuspegawais/'.$this->statuspegawai->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'statuspegawais', $this->statuspegawai->toArray());

        $response = $this->actor->call('GET', '/statuspegawais/'.$this->statuspegawai->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('statuspegawai');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'statuspegawais', $this->statuspegawai->toArray());
        $response = $this->actor->call('PATCH', 'statuspegawais/1', $this->statuspegawaiEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('statuspegawais', $this->statuspegawaiEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'statuspegawais', $this->statuspegawai->toArray());

        $response = $this->call('DELETE', 'statuspegawais/'.$this->statuspegawai->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('statuspegawais');
    }

}

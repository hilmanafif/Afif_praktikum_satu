<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusPegawaiAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->statuspegawai = factory(App\Models\StatusPegawai::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->statuspegawaiEdited = factory(App\Models\StatusPegawai::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/statuspegawais');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/statuspegawais', $this->statuspegawai->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/statuspegawais', $this->statuspegawai->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/statuspegawais/1', $this->statuspegawaiEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('statuspegawais', $this->statuspegawaiEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/statuspegawais', $this->statuspegawai->toArray());
        $response = $this->call('DELETE', 'api/v1/statuspegawais/'.$this->statuspegawai->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'statuspegawai was deleted']);
    }

}

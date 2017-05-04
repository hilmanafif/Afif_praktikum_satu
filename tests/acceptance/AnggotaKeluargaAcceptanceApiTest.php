<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnggotaKeluargaAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->anggotakeluarga = factory(App\Models\AnggotaKeluarga::class)->make([
            'id' => '1',
		'user_id' => '1',
		'nama' => 'laravel',
		'hub_keluarga' => 'laravel',
		'tempat_lahir' => 'laravel',
		'tanggal_lahir' => '2017-05-04',
		'jenis_kelamin' => 'laravel',
		'agama_id' => '1',

        ]);
        $this->anggotakeluargaEdited = factory(App\Models\AnggotaKeluarga::class)->make([
            'id' => '1',
		'user_id' => '1',
		'nama' => 'laravel',
		'hub_keluarga' => 'laravel',
		'tempat_lahir' => 'laravel',
		'tanggal_lahir' => '2017-05-04',
		'jenis_kelamin' => 'laravel',
		'agama_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/anggotakeluargas');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/anggotakeluargas', $this->anggotakeluarga->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/anggotakeluargas', $this->anggotakeluarga->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/anggotakeluargas/1', $this->anggotakeluargaEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('anggotakeluargas', $this->anggotakeluargaEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/anggotakeluargas', $this->anggotakeluarga->toArray());
        $response = $this->call('DELETE', 'api/v1/anggotakeluargas/'.$this->anggotakeluarga->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'anggotakeluarga was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnggotaKeluargaAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->anggotakeluarga = factory(_namespace_repository_\AnggotaKeluarga::class)->make([
            'id' => '1',
		'user_id' => '1',
		'nama' => 'laravel',
		'hub_keluarga' => 'laravel',
		'tempat_lahir' => 'laravel',
		'tanggal_lahir' => '2017-05-04',
		'jenis_kelamin' => 'laravel',
		'agama_id' => '1',

        ]);
        $this->anggotakeluargaEdited = factory(_namespace_repository_\AnggotaKeluarga::class)->make([
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
        $response = $this->actor->call('GET', 'anggotakeluargas');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('anggotakeluargas');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'anggotakeluargas/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'anggotakeluargas', $this->anggotakeluarga->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('anggotakeluargas/'.$this->anggotakeluarga->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'anggotakeluargas', $this->anggotakeluarga->toArray());

        $response = $this->actor->call('GET', '/anggotakeluargas/'.$this->anggotakeluarga->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('anggotakeluarga');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'anggotakeluargas', $this->anggotakeluarga->toArray());
        $response = $this->actor->call('PATCH', 'anggotakeluargas/1', $this->anggotakeluargaEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('anggotakeluargas', $this->anggotakeluargaEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'anggotakeluargas', $this->anggotakeluarga->toArray());

        $response = $this->call('DELETE', 'anggotakeluargas/'.$this->anggotakeluarga->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('anggotakeluargas');
    }

}

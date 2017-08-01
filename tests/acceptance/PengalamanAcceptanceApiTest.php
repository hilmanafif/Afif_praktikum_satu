<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PengalamanAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->pengalaman = factory(App\Models\Pengalaman::class)->make([
            'id' => '1',
		'instansi' => 'laravel',
		'jabatan' => 'laravel',
		'dari_tanggal' => '2017-08-01',
		'sampai_tanggal' => '2017-08-01',

        ]);
        $this->pengalamanEdited = factory(App\Models\Pengalaman::class)->make([
            'id' => '1',
		'instansi' => 'laravel',
		'jabatan' => 'laravel',
		'dari_tanggal' => '2017-08-01',
		'sampai_tanggal' => '2017-08-01',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/pengalamen');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/pengalamen', $this->pengalaman->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/pengalamen', $this->pengalaman->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/pengalamen/1', $this->pengalamanEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('pengalamen', $this->pengalamanEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/pengalamen', $this->pengalaman->toArray());
        $response = $this->call('DELETE', 'api/v1/pengalamen/'.$this->pengalaman->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'pengalaman was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PengalamanAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->pengalaman = factory(_namespace_repository_\Pengalaman::class)->make([
            'id' => '1',
		'instansi' => 'laravel',
		'jabatan' => 'laravel',
		'dari_tanggal' => '2017-08-01',
		'sampai_tanggal' => '2017-08-01',

        ]);
        $this->pengalamanEdited = factory(_namespace_repository_\Pengalaman::class)->make([
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
        $response = $this->actor->call('GET', 'pengalamen');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('pengalamen');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'pengalamen/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'pengalamen', $this->pengalaman->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('pengalamen/'.$this->pengalaman->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'pengalamen', $this->pengalaman->toArray());

        $response = $this->actor->call('GET', '/pengalamen/'.$this->pengalaman->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('pengalaman');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'pengalamen', $this->pengalaman->toArray());
        $response = $this->actor->call('PATCH', 'pengalamen/1', $this->pengalamanEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('pengalamen', $this->pengalamanEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'pengalamen', $this->pengalaman->toArray());

        $response = $this->call('DELETE', 'pengalamen/'.$this->pengalaman->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('pengalamen');
    }

}

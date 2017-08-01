<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PendidikanAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->pendidikan = factory(_namespace_repository_\Pendidikan::class)->make([
            'id' => '1',
		'user_id' => '1',
		'nama' => 'laravel',
		'tingkat' => 'laravel',
		'tahun_lulus' => '1',

        ]);
        $this->pendidikanEdited = factory(_namespace_repository_\Pendidikan::class)->make([
            'id' => '1',
		'user_id' => '1',
		'nama' => 'laravel',
		'tingkat' => 'laravel',
		'tahun_lulus' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'pendidikans');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('pendidikans');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'pendidikans/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'pendidikans', $this->pendidikan->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('pendidikans/'.$this->pendidikan->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'pendidikans', $this->pendidikan->toArray());

        $response = $this->actor->call('GET', '/pendidikans/'.$this->pendidikan->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('pendidikan');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'pendidikans', $this->pendidikan->toArray());
        $response = $this->actor->call('PATCH', 'pendidikans/1', $this->pendidikanEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('pendidikans', $this->pendidikanEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'pendidikans', $this->pendidikan->toArray());

        $response = $this->call('DELETE', 'pendidikans/'.$this->pendidikan->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('pendidikans');
    }

}

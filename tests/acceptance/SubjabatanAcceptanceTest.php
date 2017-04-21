<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubjabatanAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->subjabatan = factory(_namespace_repository_\Subjabatan::class)->make([
            'id' => '1',
		'jabatan_id' => 'laravel',
		'kode_subjabatan' => 'laravel',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->subjabatanEdited = factory(_namespace_repository_\Subjabatan::class)->make([
            'id' => '1',
		'jabatan_id' => 'laravel',
		'kode_subjabatan' => 'laravel',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'subjabatans');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('subjabatans');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'subjabatans/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'subjabatans', $this->subjabatan->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('subjabatans/'.$this->subjabatan->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'subjabatans', $this->subjabatan->toArray());

        $response = $this->actor->call('GET', '/subjabatans/'.$this->subjabatan->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('subjabatan');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'subjabatans', $this->subjabatan->toArray());
        $response = $this->actor->call('PATCH', 'subjabatans/1', $this->subjabatanEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('subjabatans', $this->subjabatanEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'subjabatans', $this->subjabatan->toArray());

        $response = $this->call('DELETE', 'subjabatans/'.$this->subjabatan->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('subjabatans');
    }

}

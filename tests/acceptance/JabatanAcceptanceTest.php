<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JabatanAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->jabatan = factory(_namespace_repository_\Jabatan::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->jabatanEdited = factory(_namespace_repository_\Jabatan::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'jabatans');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('jabatans');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'jabatans/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'jabatans', $this->jabatan->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('jabatans/'.$this->jabatan->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'jabatans', $this->jabatan->toArray());

        $response = $this->actor->call('GET', '/jabatans/'.$this->jabatan->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('jabatan');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'jabatans', $this->jabatan->toArray());
        $response = $this->actor->call('PATCH', 'jabatans/1', $this->jabatanEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('jabatans', $this->jabatanEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'jabatans', $this->jabatan->toArray());

        $response = $this->call('DELETE', 'jabatans/'.$this->jabatan->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('jabatans');
    }

}

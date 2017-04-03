<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JabatanAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->jabatan = factory(App\Models\Jabatan::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->jabatanEdited = factory(App\Models\Jabatan::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/jabatans');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/jabatans', $this->jabatan->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/jabatans', $this->jabatan->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/jabatans/1', $this->jabatanEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('jabatans', $this->jabatanEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/jabatans', $this->jabatan->toArray());
        $response = $this->call('DELETE', 'api/v1/jabatans/'.$this->jabatan->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'jabatan was deleted']);
    }

}

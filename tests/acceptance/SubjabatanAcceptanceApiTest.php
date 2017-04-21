<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubjabatanAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->subjabatan = factory(App\Models\Subjabatan::class)->make([
            'id' => '1',
		'jabatan_id' => 'laravel',
		'kode_subjabatan' => 'laravel',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->subjabatanEdited = factory(App\Models\Subjabatan::class)->make([
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
        $response = $this->actor->call('GET', 'api/v1/subjabatans');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/subjabatans', $this->subjabatan->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/subjabatans', $this->subjabatan->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/subjabatans/1', $this->subjabatanEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('subjabatans', $this->subjabatanEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/subjabatans', $this->subjabatan->toArray());
        $response = $this->call('DELETE', 'api/v1/subjabatans/'.$this->subjabatan->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'subjabatan was deleted']);
    }

}

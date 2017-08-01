<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PendidikanAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->pendidikan = factory(App\Models\Pendidikan::class)->make([
            'id' => '1',
		'user_id' => '1',
		'nama' => 'laravel',
		'tingkat' => 'laravel',
		'tahun_lulus' => '1',

        ]);
        $this->pendidikanEdited = factory(App\Models\Pendidikan::class)->make([
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
        $response = $this->actor->call('GET', 'api/v1/pendidikans');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/pendidikans', $this->pendidikan->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/pendidikans', $this->pendidikan->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/pendidikans/1', $this->pendidikanEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('pendidikans', $this->pendidikanEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/pendidikans', $this->pendidikan->toArray());
        $response = $this->call('DELETE', 'api/v1/pendidikans/'.$this->pendidikan->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'pendidikan was deleted']);
    }

}

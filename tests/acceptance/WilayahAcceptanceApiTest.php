<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WilayahAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->wilayah = factory(App\Models\Wilayah::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'address' => 'laravel',

        ]);
        $this->wilayahEdited = factory(App\Models\Wilayah::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'address' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/wilayahs');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/wilayahs', $this->wilayah->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/wilayahs', $this->wilayah->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/wilayahs/1', $this->wilayahEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('wilayahs', $this->wilayahEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/wilayahs', $this->wilayah->toArray());
        $response = $this->call('DELETE', 'api/v1/wilayahs/'.$this->wilayah->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'wilayah was deleted']);
    }

}

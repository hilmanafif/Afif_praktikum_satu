<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GajiPokokAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->gajipokok = factory(App\Models\GajiPokok::class)->make([
            'id' => '1',
		'id_pangkat' => 'laravel',
		'masa_kerja' => 'laravel',
		'gaji_pokok' => 'laravel',
		'gaji_tunjangan_pokok' => 'laravel',

        ]);
        $this->gajipokokEdited = factory(App\Models\GajiPokok::class)->make([
            'id' => '1',
		'id_pangkat' => 'laravel',
		'masa_kerja' => 'laravel',
		'gaji_pokok' => 'laravel',
		'gaji_tunjangan_pokok' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/gajipokoks');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/gajipokoks', $this->gajipokok->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/gajipokoks', $this->gajipokok->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/gajipokoks/1', $this->gajipokokEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('gajipokoks', $this->gajipokokEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/gajipokoks', $this->gajipokok->toArray());
        $response = $this->call('DELETE', 'api/v1/gajipokoks/'.$this->gajipokok->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'gajipokok was deleted']);
    }

}

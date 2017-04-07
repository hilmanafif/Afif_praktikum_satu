<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GajiPokokAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->gajipokok = factory(_namespace_repository_\GajiPokok::class)->make([
            'id' => '1',
		'id_pangkat' => 'laravel',
		'masa_kerja' => 'laravel',
		'gaji_pokok' => 'laravel',
		'gaji_tunjangan_pokok' => 'laravel',

        ]);
        $this->gajipokokEdited = factory(_namespace_repository_\GajiPokok::class)->make([
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
        $response = $this->actor->call('GET', 'gajipokoks');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('gajipokoks');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'gajipokoks/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'gajipokoks', $this->gajipokok->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('gajipokoks/'.$this->gajipokok->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'gajipokoks', $this->gajipokok->toArray());

        $response = $this->actor->call('GET', '/gajipokoks/'.$this->gajipokok->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('gajipokok');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'gajipokoks', $this->gajipokok->toArray());
        $response = $this->actor->call('PATCH', 'gajipokoks/1', $this->gajipokokEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('gajipokoks', $this->gajipokokEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'gajipokoks', $this->gajipokok->toArray());

        $response = $this->call('DELETE', 'gajipokoks/'.$this->gajipokok->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('gajipokoks');
    }

}

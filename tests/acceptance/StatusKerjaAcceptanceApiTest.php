<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusKerjaAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->statuskerja = factory(App\Models\StatusKerja::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->statuskerjaEdited = factory(App\Models\StatusKerja::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/statuskerjas');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/statuskerjas', $this->statuskerja->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/statuskerjas', $this->statuskerja->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/statuskerjas/1', $this->statuskerjaEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('statuskerjas', $this->statuskerjaEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/statuskerjas', $this->statuskerja->toArray());
        $response = $this->call('DELETE', 'api/v1/statuskerjas/'.$this->statuskerja->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'statuskerja was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AgamaAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->agama = factory(App\Models\Agama::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->agamaEdited = factory(App\Models\Agama::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/agamas');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/agamas', $this->agama->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/agamas', $this->agama->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/agamas/1', $this->agamaEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('agamas', $this->agamaEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/agamas', $this->agama->toArray());
        $response = $this->call('DELETE', 'api/v1/agamas/'.$this->agama->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'agama was deleted']);
    }

}

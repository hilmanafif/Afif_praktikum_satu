<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TupelAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->tupel = factory(App\Models\Tupel::class)->make([
            'id' => '1',
		'tupel' => '1',
		'tukebar' => '1',
		'tujkinerja' => '1',
		'jabatan' => '1',
		'jabatan_id' => '1',

        ]);
        $this->tupelEdited = factory(App\Models\Tupel::class)->make([
            'id' => '1',
		'tupel' => '1',
		'tukebar' => '1',
		'tujkinerja' => '1',
		'jabatan' => '1',
		'jabatan_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/tupels');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/tupels', $this->tupel->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/tupels', $this->tupel->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/tupels/1', $this->tupelEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('tupels', $this->tupelEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/tupels', $this->tupel->toArray());
        $response = $this->call('DELETE', 'api/v1/tupels/'.$this->tupel->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'tupel was deleted']);
    }

}

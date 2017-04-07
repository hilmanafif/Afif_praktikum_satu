<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PangkatAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->pangkat = factory(App\Models\Pangkat::class)->make([
            'id' => '1',
		'kodepangkat' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->pangkatEdited = factory(App\Models\Pangkat::class)->make([
            'id' => '1',
		'kodepangkat' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/pangkats');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/pangkats', $this->pangkat->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/pangkats', $this->pangkat->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/pangkats/1', $this->pangkatEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('pangkats', $this->pangkatEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/pangkats', $this->pangkat->toArray());
        $response = $this->call('DELETE', 'api/v1/pangkats/'.$this->pangkat->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'pangkat was deleted']);
    }

}

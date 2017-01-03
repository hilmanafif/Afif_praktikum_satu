<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LeavetypeAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->leavetype = factory(App\Models\Leavetype::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->leavetypeEdited = factory(App\Models\Leavetype::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/leavetypes');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/leavetypes', $this->leavetype->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/leavetypes', $this->leavetype->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/leavetypes/1', $this->leavetypeEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('leavetypes', $this->leavetypeEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/leavetypes', $this->leavetype->toArray());
        $response = $this->call('DELETE', 'api/v1/leavetypes/'.$this->leavetype->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'leavetype was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BagianAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->bagian = factory(App\Models\Bagian::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',

        ]);
        $this->bagianEdited = factory(App\Models\Bagian::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/bagians');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/bagians', $this->bagian->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/bagians', $this->bagian->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/bagians/1', $this->bagianEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('bagians', $this->bagianEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/bagians', $this->bagian->toArray());
        $response = $this->call('DELETE', 'api/v1/bagians/'.$this->bagian->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'bagian was deleted']);
    }

}

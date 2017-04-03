<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GolonganDarahAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->golongandarah = factory(App\Models\GolonganDarah::class)->make([
            'id' => '1',
		'name' => 'laravel',

        ]);
        $this->golongandarahEdited = factory(App\Models\GolonganDarah::class)->make([
            'id' => '1',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/golongandarahs');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/golongandarahs', $this->golongandarah->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/golongandarahs', $this->golongandarah->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/golongandarahs/1', $this->golongandarahEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('golongandarahs', $this->golongandarahEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/golongandarahs', $this->golongandarah->toArray());
        $response = $this->call('DELETE', 'api/v1/golongandarahs/'.$this->golongandarah->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'golongandarah was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DocumenttypeAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->documenttype = factory(App\Models\Documenttype::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->documenttypeEdited = factory(App\Models\Documenttype::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/documenttypes');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/documenttypes', $this->documenttype->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/documenttypes', $this->documenttype->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/documenttypes/1', $this->documenttypeEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('documenttypes', $this->documenttypeEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/documenttypes', $this->documenttype->toArray());
        $response = $this->call('DELETE', 'api/v1/documenttypes/'.$this->documenttype->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'documenttype was deleted']);
    }

}

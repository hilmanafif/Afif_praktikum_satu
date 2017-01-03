<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DocumenttypeAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->documenttype = factory(_namespace_repository_\Documenttype::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->documenttypeEdited = factory(_namespace_repository_\Documenttype::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'documenttypes');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('documenttypes');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'documenttypes/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'documenttypes', $this->documenttype->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('documenttypes/'.$this->documenttype->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'documenttypes', $this->documenttype->toArray());

        $response = $this->actor->call('GET', '/documenttypes/'.$this->documenttype->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('documenttype');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'documenttypes', $this->documenttype->toArray());
        $response = $this->actor->call('PATCH', 'documenttypes/1', $this->documenttypeEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('documenttypes', $this->documenttypeEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'documenttypes', $this->documenttype->toArray());

        $response = $this->call('DELETE', 'documenttypes/'.$this->documenttype->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('documenttypes');
    }

}

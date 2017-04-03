<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AgamaAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->agama = factory(_namespace_repository_\Agama::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->agamaEdited = factory(_namespace_repository_\Agama::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'agamas');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('agamas');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'agamas/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'agamas', $this->agama->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('agamas/'.$this->agama->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'agamas', $this->agama->toArray());

        $response = $this->actor->call('GET', '/agamas/'.$this->agama->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('agama');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'agamas', $this->agama->toArray());
        $response = $this->actor->call('PATCH', 'agamas/1', $this->agamaEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('agamas', $this->agamaEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'agamas', $this->agama->toArray());

        $response = $this->call('DELETE', 'agamas/'.$this->agama->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('agamas');
    }

}

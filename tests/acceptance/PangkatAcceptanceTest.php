<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PangkatAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->pangkat = factory(_namespace_repository_\Pangkat::class)->make([
            'id' => '1',
		'kodepangkat' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->pangkatEdited = factory(_namespace_repository_\Pangkat::class)->make([
            'id' => '1',
		'kodepangkat' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'pangkats');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('pangkats');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'pangkats/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'pangkats', $this->pangkat->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('pangkats/'.$this->pangkat->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'pangkats', $this->pangkat->toArray());

        $response = $this->actor->call('GET', '/pangkats/'.$this->pangkat->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('pangkat');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'pangkats', $this->pangkat->toArray());
        $response = $this->actor->call('PATCH', 'pangkats/1', $this->pangkatEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('pangkats', $this->pangkatEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'pangkats', $this->pangkat->toArray());

        $response = $this->call('DELETE', 'pangkats/'.$this->pangkat->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('pangkats');
    }

}

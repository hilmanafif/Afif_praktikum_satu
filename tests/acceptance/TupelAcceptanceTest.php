<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TupelAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->tupel = factory(_namespace_repository_\Tupel::class)->make([
            'id' => '1',
		'tupel' => '1',
		'tukebar' => '1',
		'tujkinerja' => '1',
		'jabatan' => '1',
		'jabatan_id' => '1',

        ]);
        $this->tupelEdited = factory(_namespace_repository_\Tupel::class)->make([
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
        $response = $this->actor->call('GET', 'tupels');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('tupels');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'tupels/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'tupels', $this->tupel->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('tupels/'.$this->tupel->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'tupels', $this->tupel->toArray());

        $response = $this->actor->call('GET', '/tupels/'.$this->tupel->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('tupel');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'tupels', $this->tupel->toArray());
        $response = $this->actor->call('PATCH', 'tupels/1', $this->tupelEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('tupels', $this->tupelEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'tupels', $this->tupel->toArray());

        $response = $this->call('DELETE', 'tupels/'.$this->tupel->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('tupels');
    }

}

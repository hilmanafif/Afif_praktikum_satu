<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BagianAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->bagian = factory(_namespace_repository_\Bagian::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',

        ]);
        $this->bagianEdited = factory(_namespace_repository_\Bagian::class)->make([
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
        $response = $this->actor->call('GET', 'bagians');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('bagians');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'bagians/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'bagians', $this->bagian->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('bagians/'.$this->bagian->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'bagians', $this->bagian->toArray());

        $response = $this->actor->call('GET', '/bagians/'.$this->bagian->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('bagian');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'bagians', $this->bagian->toArray());
        $response = $this->actor->call('PATCH', 'bagians/1', $this->bagianEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('bagians', $this->bagianEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'bagians', $this->bagian->toArray());

        $response = $this->call('DELETE', 'bagians/'.$this->bagian->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('bagians');
    }

}

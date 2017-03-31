<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusKerjaAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->statuskerja = factory(_namespace_repository_\StatusKerja::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->statuskerjaEdited = factory(_namespace_repository_\StatusKerja::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'statuskerjas');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('statuskerjas');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'statuskerjas/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'statuskerjas', $this->statuskerja->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('statuskerjas/'.$this->statuskerja->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'statuskerjas', $this->statuskerja->toArray());

        $response = $this->actor->call('GET', '/statuskerjas/'.$this->statuskerja->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('statuskerja');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'statuskerjas', $this->statuskerja->toArray());
        $response = $this->actor->call('PATCH', 'statuskerjas/1', $this->statuskerjaEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('statuskerjas', $this->statuskerjaEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'statuskerjas', $this->statuskerja->toArray());

        $response = $this->call('DELETE', 'statuskerjas/'.$this->statuskerja->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('statuskerjas');
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GolonganDarahAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->golongandarah = factory(_namespace_repository_\GolonganDarah::class)->make([
            'id' => '1',
		'name' => 'laravel',

        ]);
        $this->golongandarahEdited = factory(_namespace_repository_\GolonganDarah::class)->make([
            'id' => '1',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'golongandarahs');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('golongandarahs');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'golongandarahs/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'golongandarahs', $this->golongandarah->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('golongandarahs/'.$this->golongandarah->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'golongandarahs', $this->golongandarah->toArray());

        $response = $this->actor->call('GET', '/golongandarahs/'.$this->golongandarah->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('golongandarah');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'golongandarahs', $this->golongandarah->toArray());
        $response = $this->actor->call('PATCH', 'golongandarahs/1', $this->golongandarahEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('golongandarahs', $this->golongandarahEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'golongandarahs', $this->golongandarah->toArray());

        $response = $this->call('DELETE', 'golongandarahs/'.$this->golongandarah->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('golongandarahs');
    }

}

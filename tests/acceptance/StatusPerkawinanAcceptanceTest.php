<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusPerkawinanAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->statusperkawinan = factory(_namespace_repository_\StatusPerkawinan::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $this->statusperkawinanEdited = factory(_namespace_repository_\StatusPerkawinan::class)->make([
            'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'statusperkawinans');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('statusperkawinans');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'statusperkawinans/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'statusperkawinans', $this->statusperkawinan->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('statusperkawinans/'.$this->statusperkawinan->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'statusperkawinans', $this->statusperkawinan->toArray());

        $response = $this->actor->call('GET', '/statusperkawinans/'.$this->statusperkawinan->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('statusperkawinan');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'statusperkawinans', $this->statusperkawinan->toArray());
        $response = $this->actor->call('PATCH', 'statusperkawinans/1', $this->statusperkawinanEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('statusperkawinans', $this->statusperkawinanEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'statusperkawinans', $this->statusperkawinan->toArray());

        $response = $this->call('DELETE', 'statusperkawinans/'.$this->statusperkawinan->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('statusperkawinans');
    }

}

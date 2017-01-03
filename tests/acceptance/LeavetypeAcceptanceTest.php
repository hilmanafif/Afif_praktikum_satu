<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LeavetypeAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->leavetype = factory(_namespace_repository_\Leavetype::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->leavetypeEdited = factory(_namespace_repository_\Leavetype::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'leavetypes');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('leavetypes');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'leavetypes/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'leavetypes', $this->leavetype->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('leavetypes/'.$this->leavetype->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'leavetypes', $this->leavetype->toArray());

        $response = $this->actor->call('GET', '/leavetypes/'.$this->leavetype->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('leavetype');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'leavetypes', $this->leavetype->toArray());
        $response = $this->actor->call('PATCH', 'leavetypes/1', $this->leavetypeEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('leavetypes', $this->leavetypeEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'leavetypes', $this->leavetype->toArray());

        $response = $this->call('DELETE', 'leavetypes/'.$this->leavetype->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('leavetypes');
    }

}

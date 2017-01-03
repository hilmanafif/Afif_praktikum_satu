<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SkillAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->skill = factory(_namespace_repository_\Skill::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'company_id' => '1',

        ]);
        $this->skillEdited = factory(_namespace_repository_\Skill::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'skills');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('skills');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'skills/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'skills', $this->skill->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('skills/'.$this->skill->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'skills', $this->skill->toArray());

        $response = $this->actor->call('GET', '/skills/'.$this->skill->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('skill');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'skills', $this->skill->toArray());
        $response = $this->actor->call('PATCH', 'skills/1', $this->skillEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('skills', $this->skillEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'skills', $this->skill->toArray());

        $response = $this->call('DELETE', 'skills/'.$this->skill->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('skills');
    }

}

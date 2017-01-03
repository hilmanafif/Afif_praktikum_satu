<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SkillAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->skill = factory(App\Models\Skill::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'company_id' => '1',

        ]);
        $this->skillEdited = factory(App\Models\Skill::class)->make([
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
        $response = $this->actor->call('GET', 'api/v1/skills');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/skills', $this->skill->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/skills', $this->skill->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/skills/1', $this->skillEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('skills', $this->skillEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/skills', $this->skill->toArray());
        $response = $this->call('DELETE', 'api/v1/skills/'.$this->skill->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'skill was deleted']);
    }

}

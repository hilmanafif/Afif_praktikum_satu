<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EducationAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->education = factory(_namespace_repository_\Education::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->educationEdited = factory(_namespace_repository_\Education::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'education');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('education');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'education/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'education', $this->education->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('education/'.$this->education->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'education', $this->education->toArray());

        $response = $this->actor->call('GET', '/education/'.$this->education->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('education');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'education', $this->education->toArray());
        $response = $this->actor->call('PATCH', 'education/1', $this->educationEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('education', $this->educationEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'education', $this->education->toArray());

        $response = $this->call('DELETE', 'education/'.$this->education->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('education');
    }

}

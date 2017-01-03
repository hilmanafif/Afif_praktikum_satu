<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmploymentstatusAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->employmentstatus = factory(_namespace_repository_\Employmentstatus::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->employmentstatusEdited = factory(_namespace_repository_\Employmentstatus::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'employmentstatuses');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('employmentstatuses');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'employmentstatuses/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'employmentstatuses', $this->employmentstatus->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('employmentstatuses/'.$this->employmentstatus->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'employmentstatuses', $this->employmentstatus->toArray());

        $response = $this->actor->call('GET', '/employmentstatuses/'.$this->employmentstatus->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('employmentstatus');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'employmentstatuses', $this->employmentstatus->toArray());
        $response = $this->actor->call('PATCH', 'employmentstatuses/1', $this->employmentstatusEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('employmentstatuses', $this->employmentstatusEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'employmentstatuses', $this->employmentstatus->toArray());

        $response = $this->call('DELETE', 'employmentstatuses/'.$this->employmentstatus->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('employmentstatuses');
    }

}

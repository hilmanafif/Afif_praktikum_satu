<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmploymentstatusAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->employmentstatus = factory(App\Models\Employmentstatus::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->employmentstatusEdited = factory(App\Models\Employmentstatus::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/employmentstatuses');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/employmentstatuses', $this->employmentstatus->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/employmentstatuses', $this->employmentstatus->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/employmentstatuses/1', $this->employmentstatusEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('employmentstatuses', $this->employmentstatusEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/employmentstatuses', $this->employmentstatus->toArray());
        $response = $this->call('DELETE', 'api/v1/employmentstatuses/'.$this->employmentstatus->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'employmentstatus was deleted']);
    }

}

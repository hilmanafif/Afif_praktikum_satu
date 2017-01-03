<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SalarycomponentAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->salarycomponent = factory(App\Models\Salarycomponent::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'default' => 'laravel',
		'description' => 'laravel',
		'company_id' => '1',

        ]);
        $this->salarycomponentEdited = factory(App\Models\Salarycomponent::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'default' => 'laravel',
		'description' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/salarycomponents');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/salarycomponents', $this->salarycomponent->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/salarycomponents', $this->salarycomponent->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/salarycomponents/1', $this->salarycomponentEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('salarycomponents', $this->salarycomponentEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/salarycomponents', $this->salarycomponent->toArray());
        $response = $this->call('DELETE', 'api/v1/salarycomponents/'.$this->salarycomponent->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'salarycomponent was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SalarycomponentAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->salarycomponent = factory(_namespace_repository_\Salarycomponent::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'default' => 'laravel',
		'description' => 'laravel',
		'company_id' => '1',

        ]);
        $this->salarycomponentEdited = factory(_namespace_repository_\Salarycomponent::class)->make([
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
        $response = $this->actor->call('GET', 'salarycomponents');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('salarycomponents');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'salarycomponents/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'salarycomponents', $this->salarycomponent->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('salarycomponents/'.$this->salarycomponent->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'salarycomponents', $this->salarycomponent->toArray());

        $response = $this->actor->call('GET', '/salarycomponents/'.$this->salarycomponent->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('salarycomponent');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'salarycomponents', $this->salarycomponent->toArray());
        $response = $this->actor->call('PATCH', 'salarycomponents/1', $this->salarycomponentEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('salarycomponents', $this->salarycomponentEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'salarycomponents', $this->salarycomponent->toArray());

        $response = $this->call('DELETE', 'salarycomponents/'.$this->salarycomponent->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('salarycomponents');
    }

}

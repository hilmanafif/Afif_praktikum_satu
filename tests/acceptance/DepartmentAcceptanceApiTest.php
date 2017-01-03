<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DepartmentAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->department = factory(App\Models\Department::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',

        ]);
        $this->departmentEdited = factory(App\Models\Department::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/departments');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/departments', $this->department->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/departments', $this->department->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/departments/1', $this->departmentEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('departments', $this->departmentEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/departments', $this->department->toArray());
        $response = $this->call('DELETE', 'api/v1/departments/'.$this->department->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'department was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DepartmentAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->department = factory(_namespace_repository_\Department::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',

        ]);
        $this->departmentEdited = factory(_namespace_repository_\Department::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'departments');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('departments');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'departments/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'departments', $this->department->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('departments/'.$this->department->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'departments', $this->department->toArray());

        $response = $this->actor->call('GET', '/departments/'.$this->department->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('department');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'departments', $this->department->toArray());
        $response = $this->actor->call('PATCH', 'departments/1', $this->departmentEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('departments', $this->departmentEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'departments', $this->department->toArray());

        $response = $this->call('DELETE', 'departments/'.$this->department->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('departments');
    }

}

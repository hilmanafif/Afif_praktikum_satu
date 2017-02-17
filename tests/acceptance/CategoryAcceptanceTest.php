<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->category = factory(_namespace_repository_\Category::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',

        ]);
        $this->categoryEdited = factory(_namespace_repository_\Category::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'categories');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('categories');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'categories/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'categories', $this->category->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('categories/'.$this->category->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'categories', $this->category->toArray());

        $response = $this->actor->call('GET', '/categories/'.$this->category->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('category');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'categories', $this->category->toArray());
        $response = $this->actor->call('PATCH', 'categories/1', $this->categoryEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('categories', $this->categoryEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'categories', $this->category->toArray());

        $response = $this->call('DELETE', 'categories/'.$this->category->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('categories');
    }

}

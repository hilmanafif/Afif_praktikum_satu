<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->category = factory(App\Models\Category::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',

        ]);
        $this->categoryEdited = factory(App\Models\Category::class)->make([
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
        $response = $this->actor->call('GET', 'api/v1/categories');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/categories', $this->category->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/categories', $this->category->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/categories/1', $this->categoryEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('categories', $this->categoryEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/categories', $this->category->toArray());
        $response = $this->call('DELETE', 'api/v1/categories/'.$this->category->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'category was deleted']);
    }

}

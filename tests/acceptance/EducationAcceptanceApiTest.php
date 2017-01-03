<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EducationAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->education = factory(App\Models\Education::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->educationEdited = factory(App\Models\Education::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/education');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/education', $this->education->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/education', $this->education->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/education/1', $this->educationEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('education', $this->educationEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/education', $this->education->toArray());
        $response = $this->call('DELETE', 'api/v1/education/'.$this->education->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'education was deleted']);
    }

}

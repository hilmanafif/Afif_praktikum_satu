<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JobtitleAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->jobtitle = factory(App\Models\Jobtitle::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->jobtitleEdited = factory(App\Models\Jobtitle::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/jobtitles');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/jobtitles', $this->jobtitle->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/jobtitles', $this->jobtitle->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/jobtitles/1', $this->jobtitleEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('jobtitles', $this->jobtitleEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/jobtitles', $this->jobtitle->toArray());
        $response = $this->call('DELETE', 'api/v1/jobtitles/'.$this->jobtitle->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'jobtitle was deleted']);
    }

}

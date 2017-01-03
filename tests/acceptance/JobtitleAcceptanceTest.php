<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JobtitleAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->jobtitle = factory(_namespace_repository_\Jobtitle::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->jobtitleEdited = factory(_namespace_repository_\Jobtitle::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'jobtitles');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('jobtitles');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'jobtitles/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'jobtitles', $this->jobtitle->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('jobtitles/'.$this->jobtitle->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'jobtitles', $this->jobtitle->toArray());

        $response = $this->actor->call('GET', '/jobtitles/'.$this->jobtitle->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('jobtitle');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'jobtitles', $this->jobtitle->toArray());
        $response = $this->actor->call('PATCH', 'jobtitles/1', $this->jobtitleEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('jobtitles', $this->jobtitleEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'jobtitles', $this->jobtitle->toArray());

        $response = $this->call('DELETE', 'jobtitles/'.$this->jobtitle->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('jobtitles');
    }

}

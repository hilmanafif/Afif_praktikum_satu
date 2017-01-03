<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TimezoneAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->timezone = factory(_namespace_repository_\Timezone::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->timezoneEdited = factory(_namespace_repository_\Timezone::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'timezones');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('timezones');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'timezones/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'timezones', $this->timezone->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('timezones/'.$this->timezone->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'timezones', $this->timezone->toArray());

        $response = $this->actor->call('GET', '/timezones/'.$this->timezone->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('timezone');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'timezones', $this->timezone->toArray());
        $response = $this->actor->call('PATCH', 'timezones/1', $this->timezoneEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('timezones', $this->timezoneEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'timezones', $this->timezone->toArray());

        $response = $this->call('DELETE', 'timezones/'.$this->timezone->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('timezones');
    }

}

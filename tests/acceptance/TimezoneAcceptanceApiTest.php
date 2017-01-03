<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TimezoneAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->timezone = factory(App\Models\Timezone::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->timezoneEdited = factory(App\Models\Timezone::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/timezones');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/timezones', $this->timezone->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/timezones', $this->timezone->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/timezones/1', $this->timezoneEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('timezones', $this->timezoneEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/timezones', $this->timezone->toArray());
        $response = $this->call('DELETE', 'api/v1/timezones/'.$this->timezone->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'timezone was deleted']);
    }

}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LanguageAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->language = factory(App\Models\Language::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->languageEdited = factory(App\Models\Language::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/languages');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/languages', $this->language->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/languages', $this->language->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/languages/1', $this->languageEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('languages', $this->languageEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/languages', $this->language->toArray());
        $response = $this->call('DELETE', 'api/v1/languages/'.$this->language->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'language was deleted']);
    }

}

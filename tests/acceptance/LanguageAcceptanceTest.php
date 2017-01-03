<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LanguageAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->language = factory(_namespace_repository_\Language::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $this->languageEdited = factory(_namespace_repository_\Language::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'languages');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('languages');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'languages/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'languages', $this->language->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('languages/'.$this->language->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'languages', $this->language->toArray());

        $response = $this->actor->call('GET', '/languages/'.$this->language->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('language');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'languages', $this->language->toArray());
        $response = $this->actor->call('PATCH', 'languages/1', $this->languageEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('languages', $this->languageEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'languages', $this->language->toArray());

        $response = $this->call('DELETE', 'languages/'.$this->language->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('languages');
    }

}

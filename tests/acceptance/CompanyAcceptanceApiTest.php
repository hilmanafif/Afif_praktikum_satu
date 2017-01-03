<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CompanyAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->company = factory(App\Models\Company::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'tax' => 'laravel',
		'reg' => 'laravel',
		'phone' => 'laravel',
		'fax' => 'laravel',
		'address1' => 'laravel',
		'address2' => 'laravel',
		'city' => 'laravel',
		'province' => 'laravel',
		'zip' => 'laravel',
		'country' => 'laravel',
		'logo' => 'laravel',
		'timezone' => 'laravel',
		'currency' => 'laravel',

        ]);
        $this->companyEdited = factory(App\Models\Company::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'tax' => 'laravel',
		'reg' => 'laravel',
		'phone' => 'laravel',
		'fax' => 'laravel',
		'address1' => 'laravel',
		'address2' => 'laravel',
		'city' => 'laravel',
		'province' => 'laravel',
		'zip' => 'laravel',
		'country' => 'laravel',
		'logo' => 'laravel',
		'timezone' => 'laravel',
		'currency' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/companies');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/companies', $this->company->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/companies', $this->company->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/companies/1', $this->companyEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('companies', $this->companyEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/companies', $this->company->toArray());
        $response = $this->call('DELETE', 'api/v1/companies/'.$this->company->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'company was deleted']);
    }

}

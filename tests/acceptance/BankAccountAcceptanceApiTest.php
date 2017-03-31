<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BankAccountAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->bankaccount = factory(App\Models\BankAccount::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'address' => 'laravel',
		'logo' => 'laravel',

        ]);
        $this->bankaccountEdited = factory(App\Models\BankAccount::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'address' => 'laravel',
		'logo' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/bankaccounts');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/bankaccounts', $this->bankaccount->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/bankaccounts', $this->bankaccount->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/bankaccounts/1', $this->bankaccountEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('bankaccounts', $this->bankaccountEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/bankaccounts', $this->bankaccount->toArray());
        $response = $this->call('DELETE', 'api/v1/bankaccounts/'.$this->bankaccount->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'bankaccount was deleted']);
    }

}

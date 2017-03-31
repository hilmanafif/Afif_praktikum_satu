<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BankAccountAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->bankaccount = factory(_namespace_repository_\BankAccount::class)->make([
            'id' => '1',
		'name' => 'laravel',
		'address' => 'laravel',
		'logo' => 'laravel',

        ]);
        $this->bankaccountEdited = factory(_namespace_repository_\BankAccount::class)->make([
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
        $response = $this->actor->call('GET', 'bankaccounts');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('bankaccounts');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'bankaccounts/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'bankaccounts', $this->bankaccount->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('bankaccounts/'.$this->bankaccount->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'bankaccounts', $this->bankaccount->toArray());

        $response = $this->actor->call('GET', '/bankaccounts/'.$this->bankaccount->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('bankaccount');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'bankaccounts', $this->bankaccount->toArray());
        $response = $this->actor->call('PATCH', 'bankaccounts/1', $this->bankaccountEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('bankaccounts', $this->bankaccountEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'bankaccounts', $this->bankaccount->toArray());

        $response = $this->call('DELETE', 'bankaccounts/'.$this->bankaccount->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('bankaccounts');
    }

}

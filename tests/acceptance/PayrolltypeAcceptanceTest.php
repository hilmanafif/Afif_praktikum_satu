<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PayrolltypeAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->payrolltype = factory(_namespace_repository_\Payrolltype::class)->make([
            'id' => '1',
		'name' => 'laravel',

        ]);
        $this->payrolltypeEdited = factory(_namespace_repository_\Payrolltype::class)->make([
            'id' => '1',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'payrolltypes');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('payrolltypes');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'payrolltypes/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'payrolltypes', $this->payrolltype->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('payrolltypes/'.$this->payrolltype->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'payrolltypes', $this->payrolltype->toArray());

        $response = $this->actor->call('GET', '/payrolltypes/'.$this->payrolltype->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('payrolltype');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'payrolltypes', $this->payrolltype->toArray());
        $response = $this->actor->call('PATCH', 'payrolltypes/1', $this->payrolltypeEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('payrolltypes', $this->payrolltypeEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'payrolltypes', $this->payrolltype->toArray());

        $response = $this->call('DELETE', 'payrolltypes/'.$this->payrolltype->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('payrolltypes');
    }

}

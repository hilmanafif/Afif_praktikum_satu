<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PayrolltypeAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->payrolltype = factory(App\Models\Payrolltype::class)->make([
            'id' => '1',
		'name' => 'laravel',

        ]);
        $this->payrolltypeEdited = factory(App\Models\Payrolltype::class)->make([
            'id' => '1',
		'name' => 'laravel',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/payrolltypes');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/payrolltypes', $this->payrolltype->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/payrolltypes', $this->payrolltype->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/payrolltypes/1', $this->payrolltypeEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('payrolltypes', $this->payrolltypeEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/payrolltypes', $this->payrolltype->toArray());
        $response = $this->call('DELETE', 'api/v1/payrolltypes/'.$this->payrolltype->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'payrolltype was deleted']);
    }

}

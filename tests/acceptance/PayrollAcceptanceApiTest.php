<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PayrollAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->payroll = factory(App\Models\Payroll::class)->make([
            'id' => '1',
		'title' => 'laravel',
		'user_id' => '1',
		'periode' => '2017-04-04',
		'gapok' => '1.1',

        ]);
        $this->payrollEdited = factory(App\Models\Payroll::class)->make([
            'id' => '1',
		'title' => 'laravel',
		'user_id' => '1',
		'periode' => '2017-04-04',
		'gapok' => '1.1',

        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/payrolls');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/payrolls', $this->payroll->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/payrolls', $this->payroll->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/payrolls/1', $this->payrollEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeInDatabase('payrolls', $this->payrollEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/payrolls', $this->payroll->toArray());
        $response = $this->call('DELETE', 'api/v1/payrolls/'.$this->payroll->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'payroll was deleted']);
    }

}

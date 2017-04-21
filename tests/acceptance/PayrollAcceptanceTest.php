<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PayrollAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->payroll = factory(_namespace_repository_\Payroll::class)->make([
            'id' => '1',
		'title' => 'laravel',
		'user_id' => '1',
		'periode' => '2017-04-04',
		'gapok' => '1.1',

        ]);
        $this->payrollEdited = factory(_namespace_repository_\Payroll::class)->make([
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
        $response = $this->actor->call('GET', 'payrolls');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('payrolls');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'payrolls/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'payrolls', $this->payroll->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('payrolls/'.$this->payroll->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'payrolls', $this->payroll->toArray());

        $response = $this->actor->call('GET', '/payrolls/'.$this->payroll->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('payroll');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'payrolls', $this->payroll->toArray());
        $response = $this->actor->call('PATCH', 'payrolls/1', $this->payrollEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('payrolls', $this->payrollEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'payrolls', $this->payroll->toArray());

        $response = $this->call('DELETE', 'payrolls/'.$this->payroll->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('payrolls');
    }

}

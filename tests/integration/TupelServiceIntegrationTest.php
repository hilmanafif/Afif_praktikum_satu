<?php

use App\Services\TupelService;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TupelServiceIntegrationTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make(TupelService::class);
        $this->originalArray = [
            'id' => '1',
		'tupel' => '1',
		'tukebar' => '1',
		'tujkinerja' => '1',
		'jabatan' => '1',
		'jabatan_id' => '1',

        ];
        $this->editedArray = [
            'id' => '1',
		'tupel' => '1',
		'tukebar' => '1',
		'tujkinerja' => '1',
		'jabatan' => '1',
		'jabatan_id' => '1',

        ];
        $this->searchTerm = '';
    }

    public function testAll()
    {
        $response = $this->service->all();
        $this->assertEquals(get_class($response), 'Illuminate\Database\Eloquent\Collection');
        $this->assertTrue(is_array($response->toArray()));
        $this->assertEquals(0, count($response->toArray()));
    }

    public function testPaginated()
    {
        $response = $this->service->paginated(25);
        $this->assertEquals(get_class($response), 'Illuminate\Pagination\LengthAwarePaginator');
        $this->assertEquals(0, $response->total());
    }

    public function testSearch()
    {
        $response = $this->service->search($this->searchTerm, 25);
        $this->assertEquals(get_class($response), 'Illuminate\Pagination\LengthAwarePaginator');
        $this->assertEquals(0, $response->total());
    }

    public function testCreate()
    {
        $response = $this->service->create($this->originalArray);
        $this->assertEquals(get_class($response), 'App\Models\Tupel');
        $this->assertEquals(1, $response->id);
    }

    public function testFind()
    {
        // create the item
        $item = $this->service->create($this->originalArray);

        $response = $this->service->find($item->id);
        $this->assertEquals(1, $response->id);
    }

    public function testUpdate()
    {
        // create the item
        $item = $this->service->create($this->originalArray);

        $response = $this->service->update($item->id, $this->editedArray);

        $this->assertEquals(1, $response->id);
        $this->seeInDatabase('tupels', $this->editedArray);
    }

    public function testDestroy()
    {
        // create the item
        $item = $this->service->create($this->originalArray);

        $response = $this->service->destroy($item->id);
        $this->assertTrue($response);
    }

}


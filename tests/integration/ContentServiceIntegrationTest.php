<?php

use App\Services\ContentService;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContentServiceIntegrationTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make(ContentService::class);
        $this->originalArray = [
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'quote' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'offline_writer_id' => '1',
		'offline_writer' => 'laravel',
		'category_id' => '1',
		'topic_id' => '1',
		'status' => 'laravel',

        ];
        $this->editedArray = [
            'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'quote' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'offline_writer_id' => '1',
		'offline_writer' => 'laravel',
		'category_id' => '1',
		'topic_id' => '1',
		'status' => 'laravel',

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
        $this->assertEquals(get_class($response), 'App\Models\Content');
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
        $this->seeInDatabase('contents', $this->editedArray);
    }

    public function testDestroy()
    {
        // create the item
        $item = $this->service->create($this->originalArray);

        $response = $this->service->destroy($item->id);
        $this->assertTrue($response);
    }

}


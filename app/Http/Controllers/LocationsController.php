<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Logsystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LocationService;
use App\Http\Requests\LocationRequest;

class LocationsController extends Controller
{
    public function __construct(LocationService $locationService)
    {
        $this->service = $locationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = $this->service->paginated();
        return view('locations.index')->with('locations', $locations);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $locations = $this->service->search($request->search);
        return view('locations.index')->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $data = $request->except('_token');
        $data['company_id'] = 1;  // Default company_id for non SaaS
        $result = $this->service->create($data);

        if ($result) {
          $user_id = Auth::user()->id;
          $ipaddress = $request->ip();
          Logsystem::create(['name' => 'is creating new Location', 'ipaddress' => $ipaddress, 'user_id' => $user_id ]);
          return redirect(route('locations.index'))->with('message', 'Successfully created');
        }

        return redirect(route('locations.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the locations.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = $this->service->find($id);
        return view('locations.show')->with('location', $location);
    }

    /**
     * Show the form for editing the locations.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = $this->service->find($id);
        return view('locations.edit')->with('location', $location);
    }

    /**
     * Update the locations in storage.
     *
     * @param  \Illuminate\Http\LocationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
          $user_id = Auth::user()->id;
          $ipaddress = $request->ip();
          Logsystem::create(['name' => 'is updating Location', 'ipaddress' => $ipaddress, 'user_id' => $user_id ]);
          return redirect(route('locations.index'))->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the locations from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
          $user_id = Auth::user()->id;
          $ipaddress = $request->ip();
          Logsystem::create(['name' => 'is deleting Location', 'ipaddress' => $ipaddress, 'user_id' => $user_id ]);
          return redirect(route('locations.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('locations.index'))->with('message', 'Failed to delete');
    }
}

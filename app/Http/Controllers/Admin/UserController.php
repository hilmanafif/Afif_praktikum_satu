<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Models\Logsystem;
use App\Models\Anggotakeluarga;
use App\Models\Agama;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\User;
use App\Models\UserMeta;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserInviteRequest;
use Hash;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = $this->service->paginated();
        $users = User::orderBy('statuskerja_id')->orderBy('employee_number')->orderBy('name')->paginate();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if (! $request->search) {
            return redirect('admin/users');
        }

        $users = $this->service->search($request->search);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for inviting a customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInvite()
    {
        return view('admin.users.invite');
    }

    /**
     * Show the form for inviting a customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function postInvite(UserInviteRequest $request)
    {
        $result = $this->service->invite($request->except(['_token', '_method']));

        if ($result) {
            return redirect('admin/users')->with('message', 'Successfully invited');
        }

        return back()->with('error', 'Failed to invite');
    }

    /**
     * Switch to a different User profile
     *
     * @return \Illuminate\Http\Response
     */
    public function switchToUser($id)
    {
        if ($this->service->switchToUser($id)) {
            return redirect('dashboard')->with('message', 'You\'ve switched users.');
        }

        return redirect('dashboard')->with('message', 'Could not switch users');
    }

    /**
     * Switch back to your original user
     *
     * @return \Illuminate\Http\Response
     */
    public function switchUserBack()
    {
        if ($this->service->switchUserBack()) {
            return back()->with('message', 'You\'ve switched back.');
        }

        return back()->with('message', 'Could not switch back');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $agamas = Agama::select('name','id')->get();
        $user = $this->service->find($id);
        $getUser=new User();
        $jumlahAnak=$getUser->jumlahAnak($user->id);
        $jumlahPasangan=$getUser->jumlahPasangan($user->id);
        $jumlahAnggotaKeluarga=$jumlahPasangan+$jumlahAnak;
        $jumlahPendidikan=$getUser->jumlahPendidikan($user->id);
        $jumlahPengalaman=$getUser->jumlahPengalaman($user->id);
        if ($request->mode=='edit') {
          $anggotakeluarga = Anggotakeluarga::find($request->anggotakeluarga_id);
        }else if($request->mode=='editpendidikan') {
          $pendidikan = Pendidikan::find($request->pendidikan_id);
        }else if($request->mode=='editpengalaman') {
          $pengalaman = Pengalaman::find($request->pengalaman_id);
        }
        return view('admin.users.edit',compact('user', 'agamas','jumlahAnak','jumlahPasangan','jumlahAnggotaKeluarga','anggotakeluarga','jumlahPendidikan','jumlahPengalaman','pendidikan','pengalaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->meta && $request->id){
          $userMeta=UserMeta::findOrFail($request->id);
          $userMeta->update($request->meta);
          return back()->with('message', 'Successfully updated');
        }

        $result = $this->service->update($request->id, $request->except(['_token', '_method']));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
          $user_id = Auth::user()->id;
          $ipaddress = $request->ip();
          Logsystem::create(['name' => 'is deleting User', 'ipaddress' => $ipaddress, 'user_id' => $user_id ]);
          return redirect('admin/users')->with('message', 'Successfully deleted');
        }

        return redirect('admin/users')->with('message', 'Failed to delete');
    }

    public function password($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('admin.users.password')
            ->with('user', $user);
        }

        return back()->withErrors(['Could not find user']);
    }

    public function passwordupdate(Request $request, $id)
    {
        $password = $request->new_password;
        $user = User::find($id);
        User::where('id',$id)->update([
                "password" => $password,
            ]);
        return redirect('admin/users/'.$user->id.'/edit')->with('message', 'Password updated successfully');

    }
}

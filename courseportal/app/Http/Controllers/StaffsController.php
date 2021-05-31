<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::where('actor_id','=','3')->paginate(20);
        return view('staffs.index', ['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = new \App\Staff;
        $staff->name = $request->name;
        $staff->birthdate = $request->birthdate;
        $staff->short_description = $request->short_desc;

        $staff->save();

        $user = new \App\User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->actor_id = '3';
        $user->foreign_id = \App\Staff::max('id');

        $user->save();

        return redirect('/staffs')->with('Pesan', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = \App\User::where('id','=', $id);
        $staff_id = $staff->value('foreign_id');

        \App\Staff::where('id', $staff_id)
            -> update([
                    'name' => $request->name,
                    'birthdate' => $request->birthdate,
                    'short_description' => $request->short_desc
                ]);
        \App\User::where('id', $id)
            -> update([
                    'email' => $request->email
                ]);
        if(isset($request->password)){
            \App\User::where('id', $id)
            -> update([
                    'password' => bcrypt($request->password)
                ]);
        }
        return redirect('/staffs')->with('Pesan', 'Data berhasil di update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = \App\User::where('id','=', $id);
        $staff_id = $staff->value('foreign_id');
        \App\Staff::destroy($staff_id);
        \App\User::destroy($id);
        return redirect('/staffs')->with('Pesan', 'Data berhasil dihapus!');
    }
}

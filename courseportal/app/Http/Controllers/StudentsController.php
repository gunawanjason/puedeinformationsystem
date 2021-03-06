<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::where('actor_id','=','1')->paginate(20);
        //$students = \App\Student::all();
        return view('students.index', ['users'=> $users]);
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
        /*$request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'birthdate' => 'required',
            'short_desc' => 'required'
        ]);

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required',
            'birthdate' => 'required',
            'short_desc' => 'required|max:500'
        ];

        $customMessages = [
            'name.required' => 'The :attribute field is diperlukan.',
            'email.required' => 'The :attribute field is diperlukan.',
            'password.required' => 'The :attribute field is diperlukan.',
            'birthdate.required' => 'The :attribute field is diperlukan.',
            'short_desc.required' => 'The :attribute field is diperlukan.'
        ];

        $validatedData = $request->validate($rules, $customMessages);*/

        $student = new \App\Student;
        $student->name = $request->name;
        $student->birthdate = $request->birthdate;
        $student->short_description = $request->short_desc;

        $student->save();

        $user = new \App\User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->actor_id = '1';
        $user->foreign_id = \App\Student::max('id');

        $user->save();

        return redirect('/students')->with('Pesan', 'Data berhasil disimpan!');
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
        $student = \App\User::where('id','=', $id);
        $student_id = $student->value('foreign_id');

        \App\Student::where('id', $student_id)
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
        return redirect('/students')->with('Pesan', 'Data berhasil di update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = \App\User::where('id','=', $id);

        //echo "<br>sql: " . $student->toSql();
        //echo "<br>" . Str::replaceArray('?', $student->getBindings(), $student->toSql());
        //dd($student->toSql(), $student->getBindings());

        $student_id = $student->value('foreign_id');
        //echo $student_id;


        \App\Student::destroy($student_id);
        \App\User::destroy($id);
        return redirect('/students')->with('Pesan', 'Data berhasil dihapus!');
        //return redirect('/students')->with('Pesan', $student_id);
    }
}

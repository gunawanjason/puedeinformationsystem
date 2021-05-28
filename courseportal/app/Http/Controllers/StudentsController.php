<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = \App\Student::paginate(20);
        return view('students.index', ['students'=> $students]);
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
        $request->validate([
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

        $validatedData = $request->validate($rules, $customMessages);

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->birthdate = $request->birthdate;
        $student->short_description = $request->short_desc;

        $student->save();

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
        \App\Student::where('id', $id)
            -> update([
                    'name' => $request->name,
                    'birthdate' => $request->birthdate,
                    'email' => $request->email,
                    'short_description' => $request->short_desc
                ]);
        if(isset($request->password)){
            Student::where('id', $id)
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
        \App\Student::destroy($id);
        return redirect('/students')->with('Pesan', 'Data berhasil dihapus!');
    }
}

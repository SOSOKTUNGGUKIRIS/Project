<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Rombel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('rombel')->paginate(5);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = Rombel::all();
        return view('student.create', compact('rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required','nis' => 'required','gender' => 'required','rombel_id' => 'required','photo' => 'nullable|image|mimes:jpg,png|max:1024']);
        
        $photo = '';
        if($request->hasFile('photo')){
            $namafile = time() .'_'. $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo')->storeAs('students', $namafile, 'public');
        }

        $student = new Student();
        $student->name = $request->name;
        $student->nis = $request->nis;
        $student->gender = $request->gender;
        $student->rombel_id = $request->rombel_id;
        $student->photo = $photo;
        $student->save();

        return redirect()->route('student.index')
        ->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $rombels = Rombel::all();

        return view('student.edit', compact('student','rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required','nis' => 'required','gender' => 'required','rombel_id' => 'required','photo' => 'nullable|image|mimes:jpg,png|max:1024']);
        
        $photo = '';
        if($request->hasFile('photo')){
            $namafile = time() .'_'. $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo')->storeAs('students', $namafile, 'public');
        }

        $student = Student::find($id);
        $student->name = $request->name;
        $student->nis = $request->nis;
        $student->gender = $request->gender;
        $student->rombel_id = $request->rombel_id;
        $student->photo = $photo;
        $student->save();

        return redirect()->route('student.index')
        ->with('success1', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('student.index');
    }
}

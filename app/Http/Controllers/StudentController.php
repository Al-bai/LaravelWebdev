<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $classrooms = Classroom::all();

        return view('admin.student.index', compact('students', 'classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis|max:255',
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'nullable|string',
        ], [
            'nis.required' => 'NIS wajib diisi.',
            'nis.unique' => 'NIS sudah terdaftar.',
            'name.required' => 'Nama siswa wajib diisi.',
            'classroom_id.required' => 'Kelas wajib dipilih.',
            'classroom_id.exists' => 'Kelas tidak valid.',
        ]);

        Student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'classroom_id' => $request->classroom_id,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan.');
    }
}

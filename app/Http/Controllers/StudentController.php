<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Blog;
use Illuminate\Http\Request;
use Validator;
use DatTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Blog::get();
            return datatables()
                ->of($data)
                ->addColumn("action", function (Blog $data) {
                    $edit = route("students.edit", $data->id);
                    $deleteLink = route("delete", $data->id);
                    $btn =
                        '<a href="' .
                        $edit .
                        '" class="edit btn btn-danger btn-sm">Edit</a>
                        <a href="' .

                        $deleteLink .
                        '" class="destroy btn btn-primary btn-sm pro_dele">delete</a>';
                    return $btn;
                })
                ->rawColumns(["action"])
                ->make(true);
        }
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('students.create')
                ->withErrors($validator)
                ->withInput();
        }

        Blog::create($request->all());
        return redirect()->route('students.index')
            ->with('success', 'Student added successfully.');
    }


    public function edit($id)
    {
        $student = Blog::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required',
            'description' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('students.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}

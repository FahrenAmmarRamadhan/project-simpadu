<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjects = DB::table('subjects')
        ->when($request->input('title'), function ($query, $name) {
            return $query->where('title', 'like', '%' . $name . '%');
        })
            ->select('id', 'title', 'semester', 'academic_year', 'sks', 'description', DB::raw('DATE_FORMAT(created_at, "%d %M %Y") as created_at'))
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.subjects.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        Subject::create([
            'lecturer_id' => 1,
            'title' => $request['title'],
            'semester' => $request['semester'],
            'academic_year' => $request['academic_year'],
            'sks' => $request['sks'],
            'description' => $request['description']

        ]);

        return redirect(route('subject.index'))->with('success', 'New Subject Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        // Logic to show the form for editing a subject
        // ...

        return view('pages.subjects.edit')->with('subject', $subject);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $validate = $request->validated();
        $subject->update($validate);
        return redirect()->route('subject.index')->with('success', 'Edit User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Delete User Successfully');
    }
}

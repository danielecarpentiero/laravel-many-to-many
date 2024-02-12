<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projects = Project::all();

        return view('admin.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // get all types
        $types = Type::all();
        // get all technologies
        $technologies = Technology::all();

        return view('admin.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): \Illuminate\Http\RedirectResponse
    {

        $data = $request->validated();

        $new_project = new Project();
        $new_project->fill($data);
        $new_project->slug = Str::of($new_project->title)->slug('-');

        $new_project->save();

        if (isset($data['technologies'])){
            $new_project->technologies()->sync($data['technologies']);
        }

        return redirect()->route('admin.projects.index')->with('messages', "Project #$new_project->id created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        $project->slug = Str::of($data['title'])->slug('-');
        $project->update($data);

        if ($request->has('technologies')){
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }

        return redirect()->route('admin.projects.index')->with('messages', "Project $project updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): \Illuminate\Http\RedirectResponse
    {
        $project->technologies()->sync([]);
        $project_id = $project['id'];

        $project->delete();

        return redirect()->route('admin.projects.index')->with('messages', "Project $project deleted successfully.");
    }
}

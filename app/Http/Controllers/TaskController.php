<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Label;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Requests\Task\StoreRequest;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(): View
    {
        $tasks = QueryBuilder::for(Task::class)
        ->allowedFilters([
            AllowedFilter::exact('status_id'),
            AllowedFilter::exact('created_by_id'),
            AllowedFilter::exact('assigned_to_id'),
        ])
        ->with('status', 'assignedTo', 'createdBy')
        ->paginate();

        $users = User::all();
        $statuses = TaskStatus::all();

        return view('task.index', compact('tasks', 'users', 'statuses'));
    }

    public function create(): View
    {
        return view('task.create', [
            'task' => new Task(),
            'statuses' => TaskStatus::all(),
            'assignees' => User::all(),
            'labels' => Label::all()
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $task = Task::create([
                ...$request->except('labels'),
                'created_by_id' => auth()->id(),
            ]);

            $task->labels()->sync($request->get('labels'));
        });

        flash()->success(__('task.stored'));

        return redirect(route('tasks.index'));
    }

    public function show(Task $task): View
    {
        return view('task.show', ['task' => $task]);
    }


    public function edit(Task $task): View
    {
        return view('task.edit', [
            'statuses' => TaskStatus::all(),
            'assignees' => User::all(),
            'task' => $task,
            'labels' => Label::all()
        ]);
    }

    public function update(UpdateRequest $request, Task $task): RedirectResponse
    {
        DB::transaction(function () use ($request, $task) {
            $task->update($request->except('labels'));
            $task->labels()->sync($request->get('labels'));
        });
        flash()->success(__('task.updated'));
        return redirect(route('tasks.index'));
    }

    public function destroy(Task $task): RedirectResponse
    {
        if (auth()->id() !== $task->created_by_id) {
            abort(403);
        }
        $task->delete();
        flash()->success(__('task.deleted'));
        return redirect(route('tasks.index'));
    }
}

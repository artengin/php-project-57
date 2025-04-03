<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\TaskStatus;
use App\Http\Requests\TaskStatus\StoreRequest;
use App\Http\Requests\TaskStatus\UpdateRequest;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskStatus::class);
    }

    public function index(): View
    {
        $statuses = TaskStatus::paginate();
        return view('task_status.index', compact('statuses'));
    }

    public function create(): View
    {
        $status = new TaskStatus();
        return view('task_status.create', compact('status'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        TaskStatus::create($request->validated());
        flash()->success(__('task_status.stored'));
        return redirect(route('task_statuses.index'));
    }

    public function edit(TaskStatus $taskStatus): View
    {
        return view('task_status.edit', ['status' => $taskStatus]);
    }

    public function update(UpdateRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->update($request->validated());
        flash()->success(__('task_status.updated'));
        return redirect(route('task_statuses.index'));
    }

    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        if ($taskStatus->tasks()->exists()) {
            flash()->error(__('task_status.has_tasks'));
            return back()->withErrors([
                'message' => __('task_status.has_tasks'),
            ]);
        }

        $taskStatus->delete();
        flash()->success(__('task_status.deleted'));
        return redirect(route('task_statuses.index'));
    }
}

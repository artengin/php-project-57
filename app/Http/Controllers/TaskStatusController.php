<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\TaskStatus;
use App\Http\Requests\TaskStatus\ValidateRequest;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
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

    public function store(ValidateRequest $request): RedirectResponse
    {
        TaskStatus::create($request->validated());
        flash()->success(__('task_status.stored'));
        return redirect(route('task_statuses.index'));
    }

    public function edit(TaskStatus $taskStatus)
    {
        return view('task_status.edit', ['status' => $taskStatus,]);
    }

    public function update(ValidateRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->update($request->validated());
        flash()->success(__('task_status.updated'));
        return redirect(route('task_statuses.index'));
    }

    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->delete();
        flash()->success(__('task_status.deleted'));
        return redirect(route('task_statuses.index'));
    }
}

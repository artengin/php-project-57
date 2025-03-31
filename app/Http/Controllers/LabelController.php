<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Label\ValidateRequest;
use App\Http\Requests\Label\UpdateRequest;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(): View
    {
        $labels = Label::paginate();
        return view('label.index', compact('labels'));
    }

    public function create(): View
    {
        $label = new Label();
        return view('label.create', compact('label'));
    }

    public function store(ValidateRequest $request): RedirectResponse
    {
        Label::create($request->validated());
        flash()->success(__('label.stored'));
        return redirect(route('labels.index'));
    }

    public function edit(Label $label): View
    {
        return view('label.edit', ['label' => $label]);
    }

    public function update(UpdateRequest $request, Label $label): RedirectResponse
    {
        $label->update($request->validated());
        flash()->success(__('label.updated'));
        return redirect(route('labels.index'));
    }


    public function destroy(Label $label): RedirectResponse
    {
        if ($label->tasks()->exists()) {
            flash()->error(__('label.has_tasks'));
            return back()->withErrors([
                'message' => __('label.has_tasks'),
            ]);
        }
        $label->delete();
        flash()->success(__('label.deleted'));
        return redirect(route('labels.index'));
    }
}

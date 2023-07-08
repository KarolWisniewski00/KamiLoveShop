<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Policy;
use Illuminate\Http\Request;

class PagePolicyAdminController extends Controller
{
    public function index()
    {
        return view('admin.page-policy.index', [
            'section' => Policy::orderBy('order')->get(),
        ]);
    }
    public function create()
    {
        return view('admin.page-policy.create');
    }
    public function store(SectionRequest $request)
    {
        $policy = new Policy();
        $policy->type = $request->type;
        $policy->content = $request->content;
        $policy->order = $request->order;

        $res = $policy->save();

        if ($res) {
            return redirect()->route('admin.page-policy')->with('success', 'Sekcja została pomyślnie zapisana.');
        } else {
            return redirect()->route('admin.page-policy')->with('fail', 'Sekcja nie została zapisana.');
        }
    }
    public function edit($id)
    {
        return view('admin.page-policy.edit', [
            'section' => Policy::where('id', $id)->first()
        ]);
    }
    public function update(SectionRequest $request, $id)
    {
        $res = Policy::where('id', $id)->update([
            'type' => $request->type,
            'content' => $request->content,
            'order' => $request->order,
        ]);
        if ($res) {
            return redirect()->route('admin.page-policy')->with('success', 'Sekcja została pomyślnie zaktualizowana.');
        } else {
            return redirect()->route('admin.page-policy')->with('fail', 'Sekcja nie została zaktualizowana.');
        }
    }
    public function delete($id)
    {
        $res = Policy::where('id', $id)->delete();
        if ($res) {
            return redirect()->route('admin.page-policy')->with('success', 'Sekcja została pomyślnie usunięta.');
        } else {
            return redirect()->route('admin.page-policy')->with('fail', 'Sekcja nie została usunięta.');
        }
    }
}

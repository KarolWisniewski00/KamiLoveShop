<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Rule;
use Illuminate\Http\Request;

class PageRuleAdminController extends Controller
{
    public function index()
    {
        return view('admin.page-rule.index', [
            'section' => Rule::orderBy('order')->get(),
        ]);
    }
    public function create()
    {
        return view('admin.page-rule.create');
    }
    public function store(SectionRequest $request)
    {
        $rule = new Rule();
        $rule->type = $request->type;
        $rule->content = $request->content;
        $rule->order = $request->order;

        $res = $rule->save();

        if ($res) {
            return redirect()->route('admin.page-rule')->with('success', 'Sekcja została pomyślnie zapisana.');
        } else {
            return redirect()->route('admin.page-rule')->with('fail', 'Sekcja nie została zapisana.');
        }
    }
    public function edit($id)
    {
        return view('admin.page-rule.edit', [
            'section' => Rule::where('id', $id)->first()
        ]);
    }
    public function update(SectionRequest $request, $id)
    {
        $res = Rule::where('id', $id)->update([
            'type' => $request->type,
            'content' => $request->content,
            'order' => $request->order,
        ]);
        if ($res) {
            return redirect()->route('admin.page-rule')->with('success', 'Sekcja została pomyślnie zaktualizowana.');
        } else {
            return redirect()->route('admin.page-rule')->with('fail', 'Sekcja nie została zaktualizowana.');
        }
    }
    public function delete($id)
    {
        $res = Rule::where('id', $id)->delete();
        if ($res) {
            return redirect()->route('admin.page-rule')->with('success', 'Sekcja została pomyślnie usunięta.');
        } else {
            return redirect()->route('admin.page-rule')->with('fail', 'Sekcja nie została usunięta.');
        }
    }
}

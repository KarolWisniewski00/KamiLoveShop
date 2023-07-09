<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Ret;
use Illuminate\Http\Request;

class PageReturnAdminController extends Controller
{
    public function index(){
        return view('admin.page-return.index',[
            'section' => Ret::orderBy('order')->get(),
        ]);
    }
    public function create()
    {
        return view('admin.page-return.create');
    }
    public function store(SectionRequest $request)
    {
        $return = new Ret();
        $return->type = $request->type;
        $return->content = $request->content;
        $return->order = $request->order;

        $res = $return->save();

        if ($res) {
            return redirect()->route('admin.page-return')->with('success', 'Sekcja została pomyślnie zapisana.');
        } else {
            return redirect()->route('admin.page-return')->with('fail', 'Sekcja nie została zapisana.');
        }
    }
    public function edit($id)
    {
        $section = Ret::find($id);
        if (!$section) {
            return redirect()->route('admin.page-return')->with('fail', 'Sekcja nie istnieje.');
        }
        return view('admin.page-return.edit', [
            'section' => Ret::where('id', $id)->first()
        ]);
    }
    public function update(SectionRequest $request, $id)
    {
        $section = Ret::find($id);
        if (!$section) {
            return redirect()->route('admin.page-return')->with('fail', 'Sekcja nie istnieje.');
        }
        $res = Ret::where('id', '=', $id)->update([
            'type' => $request->type,
            'content' => $request->content,
            'order' => $request->order,
        ]);
        if ($res) {
            return redirect()->route('admin.page-return')->with('success', 'Sekcja została pomyślnie zaktualizowana.');
        } else {
            return redirect()->route('admin.page-return')->with('fail', 'Sekcja nie została zaktualizowana.');
        }
    }
    public function delete($id)
    {
        $section = Ret::find($id);
        if (!$section) {
            return redirect()->route('admin.page-return')->with('fail', 'Sekcja nie istnieje.');
        }
        $res = Ret::where('id', '=', $id)->delete();
        if ($res) {
            return redirect()->route('admin.page-return')->with('success', 'Sekcja została pomyślnie usunięta.');
        } else {
            return redirect()->route('admin.page-return')->with('fail', 'Sekcja nie została usunięta.');
        }
    }
}

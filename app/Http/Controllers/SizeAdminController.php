<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeAdminController extends Controller
{
    public function index()
    {
        return view('admin.size.index', [
            'siz' => Size::get(),
        ]);
    }
    public function create()
    {
        return view('admin.size.create');
    }
    public function store(SizeRequest $request)
    {
        $size = new Size();
        $size->value = $request->value;

        $res = $size->save();

        if ($res) {
            return redirect()->route('admin.size')->with('success', 'Rozmiar został pomyślnie zapisany.');
        } else {
            return redirect()->route('admin.size')->with('fail', 'Rozmiar nie został zapisany.');
        }
    }
    public function edit($id)
    {
        return view('admin.size.edit', [
            'siz' => Size::where('id', $id)->first(),
        ]);
    }
    public function update(SizeRequest $request, $id)
    {
        $res = Size::where('id', '=', $id)->update([
            'value' => $request->value,
        ]);
        if ($res) {
            return redirect()->route('admin.size')->with('success', 'Rozmiar zostałapomyślnie zaktualizowany.');
        } else {
            return redirect()->route('admin.size')->with('fail', 'Rozmiar nie został zaktualizowany.');
        }
    }
    public function delete($id)
    {
        $res = Size::where('id', '=', $id)->delete();
        if ($res) {
            return redirect()->route('admin.size')->with('success', 'Rozmiar został pomyślnie usunięty.');
        } else {
            return redirect()->route('admin.size')->with('fail', 'Rozmiar nie został usunięty.');
        }
    }
}

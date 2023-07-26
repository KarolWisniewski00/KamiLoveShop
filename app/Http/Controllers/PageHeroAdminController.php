<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeroRequest;
use App\Models\Hero;
use Illuminate\Http\Request;

class PageHeroAdminController extends Controller
{
    public function index()
    {
        return view('admin.page-hero.index', [
            'her' => Hero::orderBy('order')->paginate(8)
        ]);
    }
    public function create()
    {
        return view('admin.page-hero.create');
    }
    public function store(HeroRequest $request)
    {
        $hero = new Hero();
        $hero->h1 = $request->h1;
        $hero->p = $request->p;
        $hero->button = $request->button;
        $hero->href = $request->href;
        $hero->photo = $request->photo;
        $hero->order = $request->order;

        $res = $hero->save();

        if ($res) {
            return redirect()->route('admin.page-hero')->with('success', 'Hero został pomyślnie zapisany.');
        } else {
            return redirect()->route('admin.page-hero')->with('fail', 'Hero nie został zapisany.');
        }
    }
    public function edit($id)
    {
        $hero = Hero::find($id);
        if (!$hero) {
            return redirect()->route('admin.page-hero')->with('fail', 'Hero nie istnieje.');
        }
        return view('admin.page-hero.edit', [
            'her' => Hero::where('id', $id)->first()
        ]);
    }
    public function update(HeroRequest $request, $id)
    {
        $hero = Hero::find($id);
        if (!$hero) {
            return redirect()->route('admin.page-hero')->with('fail', 'Hero nie istnieje.');
        }
        $res = Hero::where('id', '=', $id)->update([
            'h1' => $request->h1,
            'p' => $request->p,
            'button' => $request->button,
            'href' => $request->href,
            'photo' => $request->photo,
            'order' => $request->order,
        ]);
        if ($res) {
            return redirect()->route('admin.page-hero')->with('success', 'Hero został pomyślnie zaktualizowany.');
        } else {
            return redirect()->route('admin.page-hero')->with('fail', 'Hero nie został zaktualizowany.');
        }
    }
    public function delete($id)
    {
        $hero = Hero::find($id);
        if (!$hero) {
            return redirect()->route('admin.page-hero')->with('fail', 'Hero nie istnieje.');
        }
        $res = Hero::where('id', '=', $id)->delete();
        if ($res) {
            return redirect()->route('admin.page-hero')->with('success', 'Hero został pomyślnie usunięty.');
        } else {
            return redirect()->route('admin.page-hero')->with('fail', 'Hero nie został usunięty.');
        }
    }
}

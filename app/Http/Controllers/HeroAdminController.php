<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Validation\Rule;
use Exception;
use Illuminate\Support\Str;
class HeroAdminController extends Controller
{

    //INDEX HERO
    public function hero()
    {
        return view('account.admin.hero', [
            'new' => 0,
            'id' => null,
            'heros' => Hero::get(),
        ]);
    }
    //NEW HERO
    public function hero_new()
    {
        return view('account.admin.hero', [
            'new' => 1,
            'id' => null,
            'heros' => Hero::get(),
        ]);
    }
    //NEW FORM HERO
    public function hero_new_form(Request $request)
    {
        $request->validate([
            'h1' => 'required|max:255',
            'p' => 'required|max:255',
            'button' => 'required|max:255',
            'href' => ['required', 'max:255', Rule::notIn(['Wybierz'])],
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:12288',
            'order' => 'nullable|integer',
        ]);

        $photo = request()->file('photo');
        $photo_name = Str::random(10) .'.'. $photo->getClientOriginalExtension();
        $photo->move(public_path('/photos'), $photo_name);

        $hero = new Hero();
        $hero->h1 = $request->h1;
        $hero->p = $request->p;
        $hero->button = $request->button;
        $hero->href = $request->href;
        $hero->photo = $photo_name;
        $hero->order = $request->order;

        $hero->save();

        return view('account.admin.hero', [
            'new' => 0,
            'id' => null,
            'heros' => Hero::get(),
        ]);
    }
    //EDIT HERO
    public function hero_edit($id)
    {
        return view('account.admin.hero', [
            'new' => 0,
            'id' => $id,
            'heros' => Hero::get(),
        ]);
    }
    //EDIT FORM HERO
    public function hero_edit_form(Request $request, $id)
    {
        $request->validate([
            'h1' => 'required|max:255',
            'p' => 'required|max:255',
            'button' => 'required|max:255',
            'href' => ['required', 'max:255', Rule::notIn(['Wybierz'])],
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:12288',
            'order' => 'nullable|integer',
        ]);

        $photo = request()->file('photo');

        if ($photo != null) {
            $hero = Hero::where('id', '=', $id)->first();
            try {
                unlink(public_path() . '\photos\\' . $hero->photo);
            } catch (Exception $e) {
            }
            $photo_name = Str::random(10) .'.'. $photo->getClientOriginalExtension();
            $photo->move(public_path('/photos'), $photo_name);
            Hero::where('id', '=', $id)->update([
                'photo' => $photo_name,
            ]);
        }

        Hero::where('id', '=', $id)->update([
            'h1' => $request->h1,
            'p' => $request->p,
            'button' => $request->button,
            'href' => $request->href,
            'order' => $request->order,
        ]);

        return view('account.admin.hero', [
            'new' => 0,
            'id' => null,
            'heros' => Hero::get(),
        ]);
    }
    //DELETE HERO
    public function hero_delete($id)
    {
        $hero = Hero::where('id', '=', $id)->first();

        try {
            unlink(public_path() . '\photos\\' . $hero->photo);
        } catch (Exception $e) {
        }

        Hero::where('id', '=', $id)->delete();

        return view('account.admin.hero', [
            'new' => 0,
            'id' => null,
            'heros' => Hero::get(),
        ]);
    }
}

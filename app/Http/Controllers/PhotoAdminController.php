<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use Illuminate\Http\Request;

class PhotoAdminController extends Controller
{
    public function index()
    {
        return view('admin.photo.index');
    }
    public function create()
    {
        return view('admin.photo.create');
    }
    public function store(PhotoRequest $request)
    {
        $photo = $request->file('photo');
        $photoName = $request->input('photo_name');
        $photoName = str_replace(' ', '_', $photoName);
        $photoName = str_replace('.', '_', $photoName);
        $photoName = str_replace(',', '_', $photoName);
        $photoName = str_replace('(', '_', $photoName);
        $photoName = str_replace(')', '_', $photoName);
        $photoName = str_replace('-', '_', $photoName);

        $timestamp = time();
        $extension = $photo->getClientOriginalExtension();
        $fileName = $photoName . '_' . $timestamp . '.' . $extension;

        $res = $photo->move(public_path('/photos'), $fileName);
        if ($res) {
            return redirect()->route('admin.photo')->with('success', 'Zdjęcie zostało pomyślnie zapisane.');
        } else {
            return redirect()->route('admin.photo')->with('fail', 'Zdjęcie nie zostało zapisane.');
        }
    }
    public function edit($filename)
    {
        $filePath = public_path('photos/' . $filename);
        if (!file_exists($filePath)) {
            return redirect()->route('admin.photo')->with('fail', 'Zdjęcie nie istnieje.');
        }
        return view('admin.photo.edit', ['filename' => $filename]);
    }
    public function update(PhotoRequest $request, $filename)
    {
        $filePath = public_path('photos/' . $filename);
        if (!file_exists($filePath)) {
            return redirect()->route('admin.photo')->with('fail', 'Zdjęcie nie istnieje.');
        }

        $photo = $request->file('photo');
        $photoName = $request->input('photo_name');
        $photoName = str_replace(' ', '_', $photoName);
        $photoName = str_replace('.', '_', $photoName);
        $photoName = str_replace(',', '_', $photoName);
        $photoName = str_replace('(', '_', $photoName);
        $photoName = str_replace(')', '_', $photoName);
        $photoName = str_replace('-', '_', $photoName);

        $timestamp = time();
        $extension = $photo->getClientOriginalExtension();
        $newFileName = $photoName . '_' . $timestamp . '.' . $extension;

        $existingFilePath = public_path('photos/' . $filename);
        if (file_exists($existingFilePath)) {
            unlink($existingFilePath);
        }

        $res = $photo->move(public_path('/photos'), $newFileName);

        if ($res) {
            return redirect()->route('admin.photo')->with('success', 'Zdjęcie zostało pomyślnie zapisane.');
        } else {
            return redirect()->route('admin.photo')->with('fail', 'Zdjęcie nie zostało zapisane.');
        }
    }

    public function delete($filename)
    {
        $filePath = public_path('photos/' . $filename);
        if (!file_exists($filePath)) {
            return redirect()->route('admin.photo')->with('fail', 'Zdjęcie nie istnieje.');
        }

        if (file_exists($filePath)) {
            $res = unlink($filePath);

            $photos = session('photos', []);
            $index = array_search($filename, $photos);
            if ($index !== false) {
                unset($photos[$index]);
                session()->put('photos', $photos);
            }
        }

        if ($res) {
            return redirect()->route('admin.photo')->with('success', 'Zdjęcie zostało pomyślnie usunięte.');
        } else {
            return redirect()->route('admin.photo')->with('fail', 'Zdjęcie nie zostało usunięte.');
        }
    }
}

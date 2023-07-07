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

        $timestamp = time();
        $extension = $photo->getClientOriginalExtension();
        $fileName = $photoName . '_' . $timestamp . '.' . $extension;

        $photo->move(public_path('/photos'), $fileName);

        return redirect()->route('admin.photo')->with('success', 'Zdjęcie zostało pomyślnie zapisane.');
    }
    public function edit($filename)
    {
        return view('admin.photo.edit', ['filename' => $filename]);
    }
    public function update(PhotoRequest $request, $filename)
    {
        $photo = $request->file('photo');
        $photoName = $request->input('photo_name');
        $photoName = str_replace(' ', '_', $photoName);
        $photoName = str_replace('.', '_', $photoName);
        $photoName = str_replace(',', '_', $photoName);

        $timestamp = time();
        $extension = $photo->getClientOriginalExtension();
        $newFileName = $photoName . '_' . $timestamp . '.' . $extension;

        $existingFilePath = public_path('photos/' . $filename);
        if (file_exists($existingFilePath)) {
            unlink($existingFilePath);
        }

        $photo->move(public_path('/photos'), $newFileName);

        return redirect()->route('admin.photo')->with('success', 'Zdjęcie zostało pomyślnie zaktualizowane.');
    }

    public function delete($filename)
    {
        $filePath = public_path('photos/' . $filename);
    
        if (file_exists($filePath)) {
            unlink($filePath);

            $photos = session('photos', []);
            $index = array_search($filename, $photos);
            if ($index !== false) {
                unset($photos[$index]);
                session()->put('photos', $photos);
            }
    
            return redirect()->route('admin.photo')->with('success', 'Zdjęcie zostało pomyślnie usunięte.');
        }
    
        return redirect()->route('admin.photo')->with('fail', 'Nie można odnaleźć zdjęcia o podanej nazwie.');
    }
    
}

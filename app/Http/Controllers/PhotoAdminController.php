<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
class PhotoAdminController extends Controller
{
    public function index()
    {
        $files = collect(File::files(public_path('photos')));
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 6;
        
        $currentPageItems = $files->slice(($currentPage - 1) * $perPage, $perPage)->all();
        
        $paginatedFiles = new LengthAwarePaginator(
            $currentPageItems,
            $files->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );
        return view('admin.photo.index',[
            'paginatedFiles'=>$paginatedFiles
        ]);
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

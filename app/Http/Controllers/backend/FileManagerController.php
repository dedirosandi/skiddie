<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\backend\FileManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        // $filemanagers = FileManager::all();
        $filemanagers = FileManager::where('uploaded_by', Auth::id())->get();


  

        foreach ($filemanagers as $filemanager) {
            $filemanager->shortUrl = $filemanager->shortenLink();
        }

        return view('backend.filemanager.index', compact('filemanagers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.filemanager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input

        $request->validate([
            'file' => 'required|file|max:20480',
            'file_description' => 'nullable|string',
        ]);

        // Upload file

        $uploadedBy = auth()->user();

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('file_managers');
        $fileType = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();

        // Simpan informasi file dalam database

        $fileManager = new FileManager();
        $fileManager->file_name = $fileName;
        $fileManager->file_path = $filePath;
        $fileManager->file_type = $fileType;
        $fileManager->file_size = $fileSize;
        $fileManager->file_description = $request->file_description;
        $fileManager->uploaded_by = $uploadedBy->id;
        $fileManager->save();

        // Redirect dengan pesan sukses

        return redirect('/dashboard/filemanager');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\backend\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function show(FileManager $fileManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\backend\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fileManager = FileManager::findOrFail($id);
        return view('backend.filemanager.edit', compact('fileManager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\backend\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'file' => 'nullable|file|max:20480',
            'file_description' => 'nullable|string',
        ]);

        // Cari instance FileManager berdasarkan ID
        $fileManager = FileManager::find($id);

        if (!$fileManager) {
            return redirect('/dashboard/filemanager')->with('error', 'Data tidak ditemukan.');
        }

        // Cek apakah ada file baru yang diunggah
        if ($request->hasFile('file')) {
            // Hapus file lama
            Storage::delete($fileManager->file_path);

            // Upload file baru
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('file_managers');
            $fileType = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();

            // Update informasi file dalam database
            $fileManager->file_name = $fileName;
            $fileManager->file_path = $filePath;
            $fileManager->file_type = $fileType;
            $fileManager->file_size = $fileSize;
        }

        // Update informasi file_description jika ada perubahan
        if ($request->filled('file_description')) {
            $fileManager->file_description = $request->file_description;
        }

        // Simpan perubahan pada model
        $fileManager->save();

        // Redirect dengan pesan sukses
        return redirect('/dashboard/filemanager')->with('success', 'Data berhasil diperbarui.');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\backend\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan FileManager berdasarkan ID
        $fileManager = FileManager::find($id);

        if (!$fileManager) {
            // Jika FileManager tidak ditemukan, redirect dengan pesan error
            return redirect('/dashboard/filemanager')->with('error', 'Data tidak ditemukan.');
        }

        // Hapus file terkait
        Storage::delete($fileManager->file_path);

        // Hapus data FileManager dari database
        $fileManager->delete();

        // Redirect dengan pesan sukses
        return redirect('/dashboard/filemanager')->with('success', 'Data berhasil dihapus.');
    }


    public function download(FileManager $fileManager)
    {
        $filePath = Storage::path($fileManager->file_path);
        $fileName = $fileManager->file_name;

        return response()->download($filePath, $fileName);
    }

    public function shortenLink(FileManager $fileManager)
    {
        $shortUrl = $fileManager->shortenLink();

        // Tampilkan hasil perpendekan URL
        return view('backend.filemanager.shorten_link', compact('shortUrl'));
    }
}

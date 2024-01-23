<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::select(
            'files.id as id',
            'files.en_title',
            'files.fr_title',
            'files.type',
            'files.size',
            'files.created_at',
            'files.user_id',
            'users.name'
        )
        ->join('users', 'users.id','=','user_id')
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:doc,docx,zip,pdf|max:2048',
            'en_title' => 'min:3|max:255',
            'fr_title' => 'min:3|max:255',
        ]);

        if ($request->file('file')->isValid()) {

            $extension = $request->file('file')->getClientOriginalExtension();
            $size = $request->file('file')->getSize();

            $nameFile = Str::uuid()->toString();
            $randomName = $nameFile . '.' . $extension;

            $userId = Auth::id();

            $file = new File([
                'id' => $nameFile,
                'en_title' => $request->input('en_title'),
                'fr_title' => $request->input('fr_title'),
                'type' => $extension,
                'size' => $size,
                'user_id' => $userId
            ]);

            $file->save();

            $request->file('file')->storeAs('uploads', $randomName, 'public');

            return redirect(route('files.index'))->withSuccess(trans('lang.msg_file_registered'));
        }

        return redirect()->back()->withErrors(trans('lang.msg_file_error'));
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        $userId = Auth::id();

        if ($file->user_id != $userId) {
            return redirect(route('files.index'))->withErrors(trans('lang.msg_file_access'));
        }

        return view('files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'en_title' => 'min:3|max:255',
            'fr_title' => 'min:3|max:255',
        ]);

        $userId = Auth::id();

        $file->update([
            'en_title' => $request->en_title,
            'fr_title' => $request->fr_title,
            'user_id' => $userId
        ]);

        return redirect(route('files.index'))->withSuccess(trans('lang.msg_file_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $nameFile = $file->id .'.'.$file->type;
        Storage::delete("public/uploads/{$nameFile}");

        $file->delete();

        return redirect(route('files.index'))->withSuccess(trans('lang.msg_file_deleted'));
    }

    public function download(File $file)
    {
        $nameFile = $file->id . '.' . $file->type;
        $filePath = "public/uploads/{$nameFile}";

        return Storage::download($filePath, $file->en_title . '.' . $file->type);
    }
}

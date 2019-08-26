<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FileEntriesController extends Controller
{
    
    public function index() {
        
        $user = Auth::user();
        $files = FileEntry::where('user_id', $user->id)->get();
    
        return view('files.index', compact('files'));
    }

    public function uploadFile(Request $request) {
        $user = Auth::user();
        $file = Input::file('file');
        $filename = $file->getClientOriginalName();

        $path = hash( 'sha256', time());

        if(Storage::disk('uploads')->put($path.'/'.$filename,  File::get($file))) {
            $input['filename'] = $filename;
            $input['mime'] = $file->getClientMimeType();
            $input['path'] = $path;
            $input['user_id'] = $user->id;
            $input['size'] = $file->getClientSize();
            $file = FileEntry::create($input);

            return response()->json([
                'success' => true,
                'id' => $file->id
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }

    public function create() {
        return view('files.create');
    }
}

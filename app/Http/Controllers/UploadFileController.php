<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Doc;
use App\Traits\UploadFileTrait;

class UploadFileController extends Controller
{
    //
    use UploadFileTrait;
    private $file_path;
    public function __construct()
    {
        $this->file_path = public_path('uploads/');
    }
    public function getFileUploadForm()
    {
        return view('file-upload');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
        ]);
        $fileName = $this->uploadFile($request->file('file'), $this->file_path);

        // $filePath = 'uploads/' . $fileName;
 
        // $path = Storage::disk('public')->put($filePath, file_get_contents($request->file));
        // $path = Storage::disk('public')->url($path);

        // Perform the database operation here
        Doc::create([
            'file_name' => $fileName,
        ]);
 
        return back()
            ->with('success','File has been successfully uploaded.');
    }
    
    public function show()
    {
        $docs = Doc::get();
        return view('showfile',compact('docs'));
    }
}

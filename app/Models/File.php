<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;
    protected $guarded = false;

    public static function putAndCreate($data)
    {
        $path = Storage::disk('public')->put('files/', $data['file']);

        return File::create([
            'path' => $path,
            'mime_type' => $data['file']->getClientOriginalExtension(),
            'title' => $data['file']->getClientOriginalName(), 
        ]);
        
    }
}

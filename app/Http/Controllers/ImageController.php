<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cmgmyr\Messenger\Models\Message;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $path = $request->upload->store('temps','public');
        /*$task = new Task();
        $task->id = 0;
        $task->exists = true;
        $image = $task->addMediaFromRequest('upload')->toMediaCollection('images');*/

        return response()->json([
            'url' => asset('storage/'.$path)
        ]);
    }
}
<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait MediaUploadingTrait
{
    public function storeMedia(Request $request)
    {
        // Validates file size
        if (request()->has('size')) {
            $this->validate(request(), [
                'file' => 'max:' . request()->input('size') * 1024,
            ]);
        }
        // If width or height is preset - we are validating it as an image
        if (request()->has('width') || request()->has('height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('width', 100000),
                    request()->input('height', 100000)
                ),
            ]);
        }


        $file = $request->file('file');
        $path = $request->file('file')->storePublicly('gym/products', 'spaces');
        $url = Storage::disk('spaces')->url($path);


        // $path = storage_path('tmp/uploads');

        // try {
        //     if (!file_exists($path)) {
        //         mkdir($path, 0755, true);
        //     }
        // } catch (\Exception $e) {
        // }

        // // $file = $request->file('file');

        // $name = uniqid() . '_' . trim($file->getClientOriginalName());

        // $file->move($path, $name);

        return response()->json([
            'name'          => $url,
            'url'          => $url,
            'original_name' => $url,
        ]);
    }
}
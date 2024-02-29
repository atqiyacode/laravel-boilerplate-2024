<?php

namespace Modules\Media\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class UploadController extends Controller
{

    public function upload(Request $request)
    {
        $userId = $request->user_id;
        $data = $request->all();
        if (!empty($data)) {
            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            $file = $request->file('file');

            // $filePath = $file->store('user_files/' . $user->id);
            $disk = Storage::disk('user_files'); // Replace 'your_disk_name' with the actual disk name
            $randomFileName = Str::random(36);
            $filePath = $disk->putFileAs($userId, $file, $randomFileName . '.' . $file->getClientOriginalExtension());
            return $this->respondWithSuccess([
                'message' => trans('alert.success-save'),
                'data' => config('app.url') . '/storage/user_files/' . $filePath,
            ]);
        } else {
            return $this->respondFailedValidation(
                trans('alert.error-choose-file')
            );
        }
    }

    public function returnFile(Request $request)
    {
        $path = $request->file_path;
        (bool) $hasRole = Auth::user()->hasAnyRole(['admin', 'superadmin']);
        // comment for development only
        // this function is a protection so only the owner and administrators can access the file
        if (Auth::user()->id != $request->user_id && $hasRole != 1) {
            return $this->respondNotFound(
                trans('alert.error-not-found')
            );
        }
        try {
            if (Storage::disk('user_files')->exists($path)) {
                $contents = Storage::disk('user_files')->get($path);
                $image = Image::make($contents);
                $mimeType = Storage::disk('user_files')->mimeType($path);
                return $image->response($mimeType);
            } else {
                return $this->respondNotFound(
                    trans('alert.error-not-found')
                );
            }
        } catch (FileNotFoundException $exception) {
            abort(404);
        }
    }
}

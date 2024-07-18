<?php

namespace Support\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageUploadService
{

    private static function ensureDirectoryExists(string $path): void
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true, true);
        }
    }

    private static function handleException(\Exception $exception, string $message)
    {
        // You can add logging here if needed
        abort(500, $message);
    }

    public static function uploadImage($requestImage, string $path, $size = null, $thumb = null, $old = null): string
    {
        try {
            $fullPath = public_path($path);
            self::ensureDirectoryExists($fullPath);

            $manager = new ImageManager(new Driver());
            $image = $manager->read($requestImage);

            $imageName = time() . '_' . $requestImage->getClientOriginalName();

            if ($size) {
                $size = explode('x', strtolower($size));
                $image->resize($size[0], $size[1]);
            }
            //save the image
            $image->save($path . '/' . $imageName);

            //save the image as thumbnail version
            if ($thumb) {
                if ($old) {
                    self::removeFile($path, $old);
                }
                $thumb = explode('x', $thumb);
                $manager->read($image)->resize($thumb[0], $thumb[1])->save($path . '/thumb_' . $imageName);
            }

        } catch (\Exception $exception) {
            $notify[] = ['error', 'Couldn\'t upload the image'];
            return back()->withNotify($notify);
        }

        return $imageName;
    }

    public static function removeFile(string $path, string $name): void
    {
        if (file_exists($path.'/'.$name) && is_file($path.'/'.$name)) {
            @unlink($path.'/'.$name);
        }
        if (file_exists($path.'/thumb_'.$name) && is_file($path.'/thumb_'.$name)) {
            @unlink($path.'/thumb_'.$name);
        }
    }

    public static function removeImage(string $path): void
    {
        $fullPath = public_path($path);

        if (File::exists($fullPath)) {
            try {
                File::delete($fullPath);
            } catch (\Exception $exception) {
                self::handleException($exception, 'Error deleting the image');
            }
        }
    }

    public static function getImage($image, $size = null) {
        $clean = '';
        if (file_exists($image) && is_file($image)) {
            return asset($image) . $clean;
        }
        if ($size) {
            return route('placeholder.image', $size);
        }
        return asset('assets/images/default.png');
    }
}

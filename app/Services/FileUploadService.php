<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class FileUploadService
{
    /**
     * Upload an image to a public folder and optionally delete the old file.
     *
     * @param UploadedFile $file
     * @param string $folder Relative folder name under public/ (e.g. 'images/icons')
     * @param string|null $oldUrl Old file URL to delete if present
     * @param string $prefix Optional filename prefix
     * @return string Public relative URL (e.g. '/images/icons/filename.png')
     */
    public function uploadPublicImage(UploadedFile $file, string $folder, ?string $oldUrl = null, string $prefix = ''): string
    {
        $destinationPath = public_path($folder);
        if (! File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $prefixStr = $prefix !== '' ? $prefix . '_' : '';
        $filename = $prefixStr . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $newUrl = '/' . trim($folder, '/') . '/' . $filename;

        // Delete old file if provided
        if ($oldUrl && str_starts_with($oldUrl, '/' . trim($folder, '/') . '/')) {
            $oldFilename = basename($oldUrl);
            $oldPath = public_path(trim($folder, '/') . '/' . $oldFilename);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        return $newUrl;
    }

    /**
     * Delete a public image file.
     */
    public function deletePublicImage(string $url, string $folder): void
    {
        $filename = basename($url);
        $path = public_path(trim($folder, '/') . '/' . $filename);

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}

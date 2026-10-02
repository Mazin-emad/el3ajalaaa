<?php

namespace App\Services;

use App\Models\Icon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class IconService
{
    public function __construct(
        private readonly FileUploadService $fileUploadService,
    ) {}

    public function getGroupedByCategory(): Collection
    {
        return Icon::orderBy('created_at', 'desc')->get()->groupBy('category');
    }

    public function store(string $name, string $category, UploadedFile $file): Icon
    {
        $iconUrl = $this->fileUploadService->uploadPublicImage($file, 'images/icons');

        return Icon::create([
            'name' => $name,
            'category' => $category,
            'icon_url' => $iconUrl,
        ]);
    }

    public function delete(Icon $icon): void
    {
        $this->fileUploadService->deletePublicImage($icon->icon_url, 'images/icons');
        $icon->delete();
    }
}

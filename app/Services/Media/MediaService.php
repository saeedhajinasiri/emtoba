<?php

namespace App\Services\Media;


use App\Media;
use Illuminate\Support\Facades\Auth;
use App\Enums\EState;
use Exception;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    protected $uploader;

    protected $host;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;

        $this->setHost(env('APP_URL'));
    }

    public function upload(MediaFile $file)
    {
        try {
            $this->uploader->upload($file);

            // $this->uploader->uploadThumbnail($file);

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function createMedia($item, MediaFile $file, $data = null, $user = null)
    {
        $url = $this->host . '/' . trim($file->getFullPath(), '/ \\');

        $user = $user ?: Auth::user();

        $media = $item->media()->create([
            'name' => array_get($data, 'name', $file->getName()),
            'path' => $file->getPath(),
            'disk' => $this->uploader->getDisk(),
            'url' => $url,
            'mime_type' => $file->getMimetype(),
            'title' => array_get($data, 'title', $file->getTitle() ?: $file->getName()),
            'description' => array_get($data, 'description', ''),
            'user_id' => $user ? $user->id : null,
            'state' => array_get($data, 'state', EState::enabled),
            'created_by' => $user ? $user->id : null,
            'updated_by' => $user ? $user->id : null,
            'approved_at' => array_get($data, 'approved_at', null),
        ]);

        return $media;
    }

    public function removeMedia($media)
    {
        try {
            $status = Storage::disk('public')->delete([
                $media->path . '/' . $media->name
            ]);

            $media->forceDelete();

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function batchRemoveMedia($media)
    {
        try {
            $status = Storage::disk('public')->delete($media->map(function ($item) {
                return [
                    $item->path . '/' . $item->name
                ];
            })->collapse()->all());

            if (!$status) {
                throw new Exception("Cannot Remove item from remote server");
            }

            $deletedIds = $media->pluck('id')->all();

            Media::query()->whereIn('id', $deletedIds)->forceDelete();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function attachTags($media, $tags)
    {
        return $media->tags()->attach($tags);
    }

    public static function fromUploadedFile($file)
    {
        return (new MediaFile())->fromUploadedFile($file);
    }

    public function getUploader()
    {
        return $this->uploader;
    }

    public function setHost($host)
    {
        $this->host = trim($host, '/ \\');

        return $this;
    }

}
<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Gallery\Image;
use App\Http\Services\FileService;
use App\Http\Services\ImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    public function __construct(
        private FileService $fileService,
        private ImageService $imageService
    ) {}

    public function index()
    {
        return view('backend.image.index', [
            'images' => $this->imageService->select(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.image.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        $data = $request->validated();

        try {
            $data['file'] = $this->fileService->upload($data['file'], 'images');

            $this->imageService->create($data);

            return redirect()->route('panel.image.index')->with('success', 'Image has been created');
        } catch (\Exception $err) {
            $this->fileService->delete($data['file']);

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'detail';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        return view('backend.image.edit', [
            'image' => $this->imageService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageRequest $request, string $uuid)
    {
        $data = $request->validated();

        $getImage = $this->imageService->selectFirstBy('uuid', $uuid);

        try {
            // jika upload
            if ($request->hasFile('file')) {
                // hapus gambar lama
                $this->fileService->delete($getImage->file);

                // upload gambar baru
                $data['file'] = $this->fileService->upload($data['file'], 'images');
            } else {
                // jika tidak upload
                $data['file'] = $getImage->file;
            }

            $this->imageService->update($data, $uuid);

            return redirect()->route('panel.image.index')->with('success', 'Image has been updated');
        } catch (\Exception $err) {
            if (isset($data['file'])) {
                $this->fileService->delete($data['file']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $getImage = $this->imageService->selectFirstBy('uuid', $uuid);
        $this->fileService->delete($getImage->file);

        $getImage->delete();

        return response()->json([
            'message' => 'Image has been deleted'
        ]);
    }
}

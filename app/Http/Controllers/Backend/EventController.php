<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Services\FileService;
use App\Http\Requests\EventRequest;
use App\Http\Services\EventService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    public function __construct(
        private FileService $fileService,
        private EventService $eventService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('backend.event.index', [
            'events' => $this->eventService->select(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            $data['image'] = $this->fileService->upload($data['image'], 'images');

            $this->eventService->create($data);

            return redirect()->route('panel.event.index')->with('success', 'Event has been created');
        } catch (\Exception $err) {
            $this->fileService->delete($data['file']);

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid): View
    {
        return view('backend.event.show', [
            'event' => $this->eventService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid): View
    {
        return view('backend.event.edit', [
            'event' => $this->eventService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $uuid)
    {
        $data = $request->validated();

        $getEvent = $this->eventService->selectFirstBy('uuid', $uuid);

        try {
            // jika upload
            if ($request->hasFile('image')) {
                // hapus gambar lama
                $this->fileService->delete($getEvent->file);

                // upload gambar baru
                $data['image'] = $this->fileService->upload($data['image'], 'images');
            } else {
                // jika tidak upload
                $data['image'] = $getEvent->image;
            }

            $this->eventService->update($data, $uuid);

            return redirect()->route('panel.event.index')->with('success', 'Event has been updated');
        } catch (\Exception $err) {
            if (isset($data['image'])) {
                $this->fileService->delete($data['image']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $getMenu = $this->eventService->selectFirstBy('uuid', $uuid);

        $this->fileService->delete($getMenu->image);

        $getMenu->delete();

        return response()->json([
            'message' => 'Event has been deleted'
        ]);
    }
}

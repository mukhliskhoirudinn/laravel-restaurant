<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Http\Requests\ChefRequest;
use App\Http\Services\FileService;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ChefController extends Controller
{
    public function __construct(
        private FileService $fileService,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('backend.chef.index', [
            'chefs' => DB::table('chefs')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('backend.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChefRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            // jika upload photo
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->fileService->upload($data['photo'], 'chef');
            }

            $data['uuid'] = (string) Str::uuid();

            DB::table('chefs')->insert($data);

            return redirect()->route('panel.chef.index')->with('success', 'Chef has been created');
        } catch (\Exception $err) {
            if ($request->hasFile('photo')) {
                $this->fileService->delete($data['photo']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid): View
    {
        return view('backend.chef.edit', [
            'chef' => DB::table('chefs')->where('uuid', $uuid)->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChefRequest $request, string $uuid): RedirectResponse
    {
        $data = $request->validated();

        $getChef = DB::table('chefs')->where('uuid', $uuid)->firstOrFail();

        try {
            // jika upload photo
            if ($request->hasFile('photo')) {
                if ($getChef->photo) {
                    $this->fileService->delete($getChef->photo);
                }

                $data['photo'] = $this->fileService->upload($data['photo'], 'chef');
            }

            $data['uuid'] = (string) Str::uuid();

            DB::table('chefs')->where('uuid', $uuid)->update($data);

            return redirect()->route('panel.chef.index')->with('success', 'Chef has been updated');
        } catch (\Exception $err) {
            if ($request->hasFile('photo')) {
                $this->fileService->delete($data['photo']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid): JsonResponse
    {
        $getChef = DB::table('chefs')->where('uuid', $uuid)->firstOrFail();

        DB::beginTransaction();

        try {
            if ($getChef->photo) {
                $this->fileService->delete($getChef->photo);
            }

            DB::table('chefs')->where('uuid', $uuid)->delete();

            DB::commit();

            return response()->json([
                'message' => 'Chef has been deleted'
            ]);
        } catch (\Exception $err) {
            DB::rollBack();

            if ($getChef->photo) {
                $this->fileService->delete($getChef->photo);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }
}

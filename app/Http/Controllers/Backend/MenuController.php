<?php

namespace App\Http\Controllers\Backend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Http\Services\FileService;
use App\Http\Services\MenuService;
use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;

class MenuController extends Controller
{
    public function __construct(
        private FileService $fileService,
        private CategoryService $categoryService,
        private MenuService $menuService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.menu.index', [
            'menus' => $this->menuService->select(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menu.create', [
            'categories' => $this->categoryService->select()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $data = $request->validated();

        try {
            $data['image'] = $this->fileService->upload($data['image'], 'images');

            $this->menuService->create($data);

            return redirect()->route('panel.menu.index')->with('success', 'Menu has been created');
        } catch (\Exception $err) {
            $this->fileService->delete($data['image']);

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return view('backend.menu.show', [
            'menu' => $this->menuService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $menu = $this->menuService->selectFirstBy('uuid', $uuid);

        if (!$menu) {
            return redirect()->route('panel.menu.index')->with('error', 'Menu not found');
        }

        return view('backend.menu.edit', [
            'menu' => $menu,
            'categories' => $this->categoryService->select()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|max:2048',
        ]);

        // Temukan menu yang akan diupdate
        $menu = Menu::findOrFail($id);

        // Update data menu
        $menu->name = $validatedData['name'];
        $menu->category_id = $validatedData['category_id'];
        $menu->description = $validatedData['description'];
        $menu->price = $validatedData['price'];
        $menu->status = $validatedData['status'];

        // Jika ada gambar yang diupload, proses dan simpan
        if ($request->hasFile('image')) {
            // Logika penyimpanan gambar (misalnya ke storage)
            $path = $request->file('image')->store('images', 'public');
            $menu->image = $path;
        }

        // Simpan perubahan ke database
        $menu->save();

        return redirect()->route('panel.menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $getMenu = $this->menuService->selectFirstBy('uuid', $uuid);

        $this->fileService->delete($getMenu->image);

        $getMenu->delete();

        return response()->json([
            'message' => 'Menu has been deleted'
        ]);
    }
}

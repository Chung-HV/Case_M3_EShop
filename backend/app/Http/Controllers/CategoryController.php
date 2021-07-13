<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recuisive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recuisive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(10);
        $htmlOptionSearchHeader = $this->getCategory($parentId = '');
        return view('admins.category.index', compact('categories','htmlOptionSearchHeader'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admins.category.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug'=>str::slug($request->name,'-')
        ]);
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->findorfail($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admins.category.edit', compact('category', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        $this->category->findorfail($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }

}

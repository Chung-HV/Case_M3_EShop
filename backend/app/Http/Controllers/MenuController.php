<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Components\MenuRecuisive;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecuisive;
    private $menu;
    public function __construct(MenuRecuisive $menuRecuisive, Menu $menu)
    {
        $this->menuRecuisive = $menuRecuisive;
        $this->menu = $menu;
    }

    public function index()
    {
        $htmlOption= $this->menuRecuisive->menuRecuisiveAdd();
        $menus = $this->menu->paginate(10);
        return view('admins.menus.index', compact('menus', 'htmlOption'));
    }

    public function create()
    {
        $htmlOption= $this->menuRecuisive->menuRecuisiveAdd();
        return view('admins.menus.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug'=>str::slug($request->name,'-')
        ]);
        return redirect()->route('menu.index');
    }

    public function getMenu($parentId)
    {
        $data = $this->menu->all();
        $recusive = new MenuRecuisive();
        $htmlOption = $recusive->menuRecuisiveEdit($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $menu = $this->menu->findorfail($id);
        $htmlOption = $this->getMenu($menu->parent_id);
        return view('admins.menus.edit', compact('menu', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        $this->menu->findorfail($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug'=>str::slug($request->name,'-')
        ]);
        return redirect()->route('menu.index');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menu.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admins.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admins.setting.add');
    }

    public function store(AddSettingRequest $request)
    {
        $this->setting->create([
            'config_key'=> $request->config_key,
            'config_value'=> $request->config_value,
            'type' => $request->type,
        ]);
       return redirect()->route('setting.index');
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admins.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->setting->find($id)->update([
            'config_key'=> $request->config_key,
            'config_value'=> $request->config_value,
        ]);
        return redirect()->route('setting.index');
    }

    public function delete($id)
    {
        try {
            $this->setting->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success',
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message'.$exception->getMessage().'line'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail',
            ], 500);
        };
    }
}

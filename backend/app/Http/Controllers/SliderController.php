<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\StorageImgTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    protected $slider;
    use StorageImgTrait;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admins.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admins.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImgSlider = $this->storageImageUpload($request, 'image_path', 'slider');
            if(!empty($dataImgSlider)){
                $dataInsert['image_name'] = $dataImgSlider['file_name'];
                $dataInsert['image_path'] = $dataImgSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        } catch (\Exception $exception){
            Log::error('Message'.$exception->getMessage().'line'.$exception->getLine());
        }

    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admins.slider.edit', compact('slider'));
    }

    public function update(Request $request,$id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImgSlider = $this->storageImageUpload($request, 'image_path', 'slider');
            if(!empty($dataImgSlider)){
                $dataUpdate['image_name'] = $dataImgSlider['file_name'];
                $dataUpdate['image_path'] = $dataImgSlider['file_path'];
            }
            $this->slider->find($id)->Update($dataUpdate);
            return redirect()->route('slider.index');
        } catch (\Exception $exception){
            Log::error('Message'.$exception->getMessage().'line'.$exception->getLine());
        }

    }

    public function delete($id)
    {
        try {
            $this->slider->find($id)->delete();
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

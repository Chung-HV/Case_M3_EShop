<?php

namespace App\Http\Controllers;

use App\Components\Recuisive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImgTrait;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    use StorageImgTrait;

    private $category;
    private $product;
    private $product_image;
    private $tag;
    private $product_tag;

    public function __construct(Category $category, Product $product, ProductImage $product_image, Tag $tag, ProductTag $product_tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->product_image = $product_image;
        $this->tag = $tag;
        $this->product_tag = $product_tag;
    }

    public function index()
    {
        $htmlOptionSearchHeader = $this->getCategory($parentId = '');
        $products = $this->product->latest()->paginate(5);
        return view('admins.product.index', compact('products', 'htmlOptionSearchHeader'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recuisive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admins.product.add', compact('htmlOption'));
    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataUploadImg = $this->storageImageUpload($request, 'feature_image_path', 'product');
            $dataCreateProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            if (!empty($dataUploadImg)) {
                $dataCreateProduct['feature_image_path'] = $dataUploadImg['file_path'];
                $dataCreateProduct['featue_image_name'] = $dataUploadImg['file_name'];
            }
            $product = $this->product->create($dataCreateProduct);

            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataImgProductDetail = $this->storageImageUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataImgProductDetail['file_path'],
                        'image_name' => $dataImgProductDetail['file_name']
                    ]);
                }
            }
            $tagIds =[];
            if(!empty($request->tags)){
                foreach ($request->tags as $tag) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tag]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'line'.$exception->getLine());
        };
    }

    public function edit($id)
    {
        $product = $this->product->findOrfail($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admins.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataUploadImg = $this->storageImageUpload($request, 'feature_image_path', 'product');

            $dataUpdateProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            if (!empty($dataUploadImg)) {
                $dataUpdateProduct['feature_image_path'] = $dataUploadImg['file_path'];
                $dataUpdateProduct['featue_image_name'] = $dataUploadImg['file_name'];
            }

            $this->product->find($id)->update($dataUpdateProduct);

            $product = $this->product->find($id);
            if ($request->hasFile('image_path')) {
                $this->product_image->Where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataImgProductDetail = $this->storageImageUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataImgProductDetail['file_path'],
                        'image_name' => $dataImgProductDetail['file_name']
                    ]);
                }
            }
            $tagIds = [];
            if(!empty($request->tags)){
                foreach ($request->tags as $tag) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tag]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'line'.$exception->getLine());
        };
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $product = $this->product->find($id);
            $tagIds = [];
            foreach ($product->tags as $tag){
                $tagIds[] = $tag->id;
            }
            $product->tags()->detach($tagIds);
            $this->product->find($id)->delete();
            DB::commit();
            return response()->json([
                'code'=>200,
                'message'=>'success',
            ], 200);

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'line'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail',
            ], 500);
        };
    }

    public function search(Request $request)
    {
        $products = Product::Where('name', 'like', '%'.$request->name.'%')->paginate(5);
        $htmlOptionSearchHeader = $this->getCategory($parentId = '');
        return view('admins.product.index', compact('products', 'htmlOptionSearchHeader'));
    }

    public function detail($id)
    {
        $product= $this->product->find($id);
        $htmlOptionSearchHeader = $this->getCategory($parentId = '');
        return view('admins.product.detail', compact('product', 'htmlOptionSearchHeader'));
    }

}

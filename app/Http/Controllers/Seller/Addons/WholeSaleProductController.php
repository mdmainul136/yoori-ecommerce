<?php

namespace App\Http\Controllers\Seller\Addons;

use Sentinel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Repositories\Admin\VatTaxRepository;
use App\Repositories\Interfaces\Admin\SellerInterface;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Repositories\Interfaces\Admin\Product\BrandInterface;
use App\Repositories\Interfaces\Admin\Product\ColorInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use App\Repositories\Interfaces\Admin\Product\CategoryInterface;
use App\Repositories\Interfaces\Admin\WholesaleProductInterface;
use App\Repositories\Interfaces\Admin\Product\AttributeInterface;

class WholeSaleProductController extends Controller
{
    protected $products;
    protected $wholesale_products;
    protected $categories;
    protected $brands;
    protected $colors;
    protected $attributes;
    protected $vat_tax;
    protected $languages;
    protected $seller;

    public function __construct(ProductInterface $products,
                                WholesaleProductInterface $wholesale_products,
                                CategoryInterface $categories,
                                BrandInterface $brands,
                                ColorInterface $colors,
                                AttributeInterface $attributes,
                                VatTaxRepository $vat_tax,
                                SellerInterface $seller,
                                LanguageInterface $languages)
    {
        $this->products             = $products;
        $this->wholesale_products   = $wholesale_products;
        $this->categories           = $categories;
        $this->brands               = $brands;
        $this->colors               = $colors;
        $this->attributes           = $attributes;
        $this->vat_tax              = $vat_tax;
        $this->languages            = $languages;
        $this->seller               = $seller;
    }
    public function wholesaleProducts(Request $request, $status = null){
        try {
            $request['sq']          = Sentinel::getUser()->id;
            $products               = $this->products->paginate($request, $status ,get_yrsetting('paginate'),'wholesale');
            $selected_category      = isset($request->c) ? $this->categories->get($request->c) : null;

            return view('seller.wholesale-product.products', compact('status','products','selected_category'));
        } catch (\Exception $e) {
            Toastr::error(__('Something went wrong, please try again'));
            return back();
        }
    }
    public function create(Request $request){
        $data = [
            'category'      => $this->categories->get(old('category')),
            'brand'         => $this->brands->get(old('brand')),
            'colors' => $this->colors->all()->where('lang', 'en')->get(),
            'attributes' => $this->attributes->all()->where('lang', 'en')->get(),
            'campaigns' => \App\Models\Campaign::where('status', 1)->where('end_date', '>', Carbon::now()->format('Y-m-d'))->get(),
            'r' => $request->r != '' ? $request->r : $request->server('HTTP_REFERER')
        ];

        return view('seller.wholesale-product.form', $data);
    }

    public function store(ProductStoreRequest $request)
    {
        if ($this->wholesale_products->store($request)):
            Toastr::success(__('Created Successfully'));
            return redirect()->route('seller.wholesale.products');
        else:
            Toastr::error(__('Something went wrong, please try again'));
            return back()->withInput();
        endif;
    }
    public function edit($id, Request $request){
        try {
            $product = $this->products->get($id);
            $languages  = $this->languages->all()->orderBy('id', 'asc')->get();

            $lang       = $request->lang != '' ? $request->lang : app()->getLocale();
            if ($product->user_id == Sentinel::getUser()->id && $product_language = $this->products->getByLang($id, $lang)):
                $data = [
                    'category'          => $this->categories->get(old('category', @$product->category_id)),
                    'brand'             => $this->brands->get(old('brand', @$product->brand_id)),
                    'colors'            => $this->colors->all()->where('lang', 'en')->get(),
                    'attributes'        => $this->attributes->all()->where('lang', 'en')->get(),
                    'r'                 => $request->r != ''? $request->r : $request->server('HTTP_REFERER'),
                    'languages'         => $languages,
                    'product_language'  => $product_language,
                    'lang'              => $lang,
                    'wholesalePrices'   => $this->wholesale_products->wholesalePrices($id)
                ];


                return view('seller.wholesale-product.edit',$data);

            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        } catch (\Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }
    public function update(ProductUpdateRequest $request)
    {
        $product    = $this->products->get($request->id);
        if ($product->user_id == Sentinel::getUser()->id):
            if ($this->wholesale_products->update($request)):
                Toastr::success(__('Updated Successfully'));
                return redirect($request->r);
            else:
                Toastr::error(__('Something went wrong, please try again'));
                return back()->withInput();
            endif;
        else:
            abort(404);
        endif;
    }

    public function cloneWholesaleProduct($id, Request $request){
        try {
            $languages  = $this->languages->all()->orderBy('id', 'asc')->get();

            $lang       = $request->lang != '' ? $request->lang : \App::getLocale();
            $product_language = $this->products->getByLang($id, $lang);

            if ($this->products->get($id) && $product_language):
                $data = [
                    'category'          => $this->categories->allCategory()->where('parent_id', null)->where('status',1),
                    'brand'             => $this->brands->all()->where('status',1)->get(),
                    'colors'            => $this->colors->all()->where('lang', 'en')->get(),
                    'attributes'        => $this->attributes->all()->where('lang', 'en')->get(),
                    'wholesalePrices'   => $this->wholesale_products->wholesalePrices($id),
                    'r'                 => $request->r != ''? $request->r : $request->server('HTTP_REFERER'),
                    'languages'         => $languages,
                    'product_language'  => $product_language,
                    'lang'              => $lang,
                    'clone'             => 1,
                ];

                return view('seller.wholesale-product.edit', $data);
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        } catch (\Exception $e){
            Toastr::error(__('Something went wrong, please try again'));
            return back();
        }
    }
    public function storeCloneWholesaleProduct(ProductStoreRequest $request){
        if ($this->wholesale_products->store($request)):
            Toastr::success(__('Created Successfully'));
            return redirect($request->r);
        else:
            Toastr::error(__('Something went wrong, please try again'));
            return back()->withInput();
        endif;
    }
}

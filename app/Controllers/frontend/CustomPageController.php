<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16
 * Time: 13:38
 */

namespace Smartbro\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Category;
use App\Models\Catalog\Brand;
use App\Models\Catalog\Product;
use App\Models\Widget\Block;
use Illuminate\Http\Request;
use App\Models\Catalog\Product\Colour;
use App\Models\Catalog\Tag;
use Carbon;


class CustomPageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function about(){
        $this->dataForView['menuName'] = 'about-us';
        return view(
            _get_frontend_theme_path('pages.about_us'),
            $this->dataForView
        );
    }
    public function games(){
        $this->dataForView['featureProducts'] = Category::LoadFeatureProducts();
        $this->dataForView['promotionProducts'] = Category::LoadPromotionProducts();

        $this->dataForView['menuName'] = 'games';
        return view(
            _get_frontend_theme_path('pages.games'),
            $this->dataForView
        );
    }
    public function team(){
        $this->dataForView['menuName'] = 'team building';
        return view(
            _get_frontend_theme_path('pages.404'),
            $this->dataForView
        );
    }

    public function party(){
        $this->dataForView['menuName'] = 'special party';
        return view(
            _get_frontend_theme_path('pages.404'),
            $this->dataForView
        );
    }

    public function faq(){
        $this->dataForView['menuName'] = 'faq';
        return view(
            _get_frontend_theme_path('pages.404'),
            $this->dataForView
        );
    }
    public function join(){
    $this->dataForView['menuName'] = 'franchise';
    return view(
        _get_frontend_theme_path('pages.404'),
        $this->dataForView
    );
}

    public function change_month($uri,$sort){
        $product = Product::GetByUri($uri);

        if(!$product){
            return response()->view(_get_frontend_theme_path('pages.404'), $this->dataForView, 404);
        }

        $this->dataForView['pageTitle'] = $product->getProductName();
        $this->dataForView['metaKeywords'] = $product->keywords;
        $this->dataForView['metaDescription'] = $product->seo_description;


        $this->dataForView['product'] = $product;
        $this->dataForView['relatedProducts'] = $product->relatedProduct;
        $this->dataForView['product_images'] = $product->get_AllImages();
        $this->dataForView['tags'] = $product->getTagsForView();

        /**
         * 产品的属性集的值
         */
        $this->dataForView['product_attributes'] = $product->productAttributes();
        $this->dataForView['product_options'] = $product->options();
        $this->dataForView['product_colours'] = Colour::LoadByProduct($product->id, true)->toArray();
        $this->dataForView['vuejs_libs_required'] = ['product_view'];

        /**
         * 加载通用的产品相关的Blocks
         */
        $this->dataForView['productDescriptionTop'] = Block::where('short_code','like','product_description_block_top%')->get();
        $this->dataForView['productDescriptionBottom'] = Block::where('short_code','like','product_description_block_bottom%')->get();
        $this->dataForView['productShortDescriptionTop'] = Block::where('short_code','like','product_short_description_block_top%')->get();
        $this->dataForView['productShortDescriptionBottom'] = Block::where('short_code','like','product_short_description_block_bottom%')->get();

        $this->dataForView['frontdate'] = Carbon\Carbon::now()->addMonth(intval($sort))->startOfMonth();
        $this->dataForView['month_interval'] = $sort;
        return view(_get_frontend_theme_path('catalog.product'),$this->dataForView);
    }
}
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
use Smartbro\Models\Franchise;
use Carbon;


class CustomPageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function about(){
        $this->dataForView['menuName'] = 'about-us';
        $this->dataForView['pageTitle'] = 'Escape Rooms | Things To Do Near Mee';
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
        $this->dataForView['pageTitle'] = 'WHY AN ESCAPE ROOM? | Team Building | Corporate Event';
        $this->dataForView['menuName'] = 'team building';
        return view(
            _get_frontend_theme_path('pages.team'),
            $this->dataForView
        );
    }

    public function term(){
        $this->dataForView['pageTitle'] = 'Terms and Conditions';
        $this->dataForView['menuName'] = 'Terms and conditions';
        return view(
            _get_frontend_theme_path('pages.terms'),
            $this->dataForView
        );
    }

    public function policy(){
        $this->dataForView['pageTitle'] = 'PRIVACY POLICY';
        $this->dataForView['menuName'] = 'PRIVACY POLICY';
        return view(
            _get_frontend_theme_path('pages.policy'),
            $this->dataForView
        );
    }

    public function faq(){
        $this->dataForView['pageTitle'] = 'Escape Experience | Team Building Activity';
        $this->dataForView['menuName'] = 'faq';
        return view(
            _get_frontend_theme_path('pages.faq'),
            $this->dataForView
        );
    }
    public function join(){
        $this->dataForView['pageTitle'] = 'Best Escape Room Melbourne | Adventure Games Melbourne | Franchise';
        $this->dataForView['menuName'] = 'franchise';
    return view(
        _get_frontend_theme_path('pages.franchise'),
        $this->dataForView
    );
    }
    public function joinpost(Request $request){
        $lead = $request->get('lead');
        $this->dataForView['menuName'] = 'franchise';
        if($lead = Franchise::Persistent($lead)){
            return back()->with('success','Your reservation has been sent!');
        }
        return back()->with('error','Something wrong with the server!');

    }
    public function pricing(){
        $this->dataForView['pageTitle'] = 'Escape Room Near Me | Escape Room Glen Waverley';
        $this->dataForView['menuName'] = 'pricing';
        return view(
            _get_frontend_theme_path('pages.pricing'),
            $this->dataForView
        );
    }

    public function verify($file){
        return response()->download( public_path(). '/storage/uploads/'.$file);
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
        $this->dataForView['frontdate'] = Carbon\Carbon::now()->addMonthsNoOverflow(intval($sort))->startOfMonth();
        $this->dataForView['month_interval'] = $sort;
        return view(_get_frontend_theme_path('catalog.product'),$this->dataForView);
    }
}
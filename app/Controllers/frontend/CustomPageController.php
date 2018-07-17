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
}
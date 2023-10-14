<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Landing;
use App\Models\Upload;
use App\Models\Event;

use DB;

class SitemapController extends Controller
{
    public function index(Request $r)
    {
       
       	$website = 'http://bcscomputercity.org/';      
       	$Login = 'http://bcscomputercity.org/login';
     	$contents = Landing::orderBy('id','desc')->where('statuscode',200)->get();
     	$events = Event::orderBy('id','desc')->where('status',1)->get();
      	return response()->view('sitemap',[
          	'contents' => $contents,
          	'events' => $events,
      	])->header('Content-Type', 'text/xml');
    }

	public function imagesitemap(Request $r)
    {      
		$website = 'http://bcscomputercity.org/';      
		$Login = 'http://bcscomputercity.org/login';

		$images = Upload::orderBy('id','desc')->where('status',1)->get();
		//dd($images);
      	return response()->view('imageSitemap', [
          	'images' => $images,
      	])->header('Content-Type', 'text/xml');
    }

	// public function imagesitemapproductone(Request $r)
    // {
       
    //    	$website = 'https://www.binarylogic.com.bd';
    //    	$pc_builder = 'http://www.binarylogic.com.bd/binarylogic/tools/pc_builder';
    //    	$cutomerLogin = 'https://www.binarylogic.com.bd/customerLogin';
    //    	$customerRegister = 'https://www.binarylogic.com.bd/customerRegister';
    //    	$cart = 'https://www.binarylogic.com.bd/cart';

    //  	$products = Product::orderBy('products.id','desc')
	// 		->select('products.id','products.name','products.slug','products.image','products.image_alt','products.image_des')
	// 		->where('status', 1)
	// 		->get();

    //   	return response()->view('imageSitemapProductOne', [
        
    //       	'products' => $products,

    //   	])->header('Content-Type', 'text/xml');
    // }

    // public function feed()
    // {


    //    	$website = 'www.binarylogic.com.bd';
    //    	$pc_builder = 'http://binarylogic.com.bd/binarylogic/tools/pc_builder';
    //    	$cutomerLogin = 'https://binarylogic.com.bd/customerLogin';
    //    	$customerRegister = 'https://binarylogic.com.bd/customerRegister';
    //    	$cart = 'https://binarylogic.com.bd/cart';


    //  	$categories = Category::orderBy('id','desc')->get();
    //  	$subcategories = Subcategory::orderBy('id','desc')->get();
    //  	$pro_sub_cats = Prosubcategory::orderBy('id','desc')->get();
    //  	$pro_pro_sub_cats = Proprocategory::orderBy('id','desc')->get();
    //  	$brands = Brand::orderBy('id','desc')->get();
    //  	$banners = Banner::orderBy('id','desc')->get();

    //  	$posts = Post::orderBy('id','desc')->get();
    //  	$components = Component::orderBy('id','desc')->get();

    //  	$products = Product::orderBy('id','desc')->where('status', 1)->get();


    //   	return response()->view('rss', [
    //       	'categories' => $categories,
    //       	'subcategories' => $subcategories,
    //       	'pro_sub_cats' => $pro_sub_cats,
    //       	'pro_pro_sub_cats' => $pro_pro_sub_cats,
    //       	'brands' => $brands,
    //       	'banners' => $banners,
    //       	'posts' => $posts,
    //       	'components' => $components,
    //       	'products' => $products,

    //   	])->header('Content-Type', 'application/xml');

    // }
    
    public function robots()
    {
        return response(view('robots'))->header('Content-Type', 'text/plain');
    }    
}

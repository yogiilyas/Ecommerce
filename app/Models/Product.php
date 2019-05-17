<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function images()
    {
        return $this->belongsToMany('App\Models\Image', 'product_images');
    }

    public function productReviews()
    {
    	return $this->hasMany('App\Models\productReview', 'product_id');
    }

    public function orderProducts($order_by) {
    	// $query = 'SELECT * FROM products ORDER BY created_at DESC';
    	// if ($order_by == 'best_seller') {
    	// 	$query ="SELECT p.*, oi.quantity FROM products AS p LEFT JOIN (SELECT product_id, SUM(quantity) as quantity from order_items GROUP BY product_id) AS oi ON oi.product_id = p.id ORDER BY oi.quantity DESC;";
    	// } else if ($order_by == 'terbaik'){
    	// 	$query = "SELECT * FROM products ORDER BY created_at DESC";
    	// } else if ($order_by == 'termurah'){
    	// 	$query = "SELECT * FROM products ORDER BY price ASC";
    	// } else if ($order_by == 'termahal'){
    	// 	$query = "SELECT * FROM products ORDER BY price DESC";
    	// } else if ($order_by == 'terbaru'){
    	// 	$query = "SELECT * FROM products ORDER BY created_at DESC";
    	// }
    	// return DB::select($query);
    	$query = DB::table('products')
    	->join('product_images','products.id','=','product_images.product_id')
    	->join('images','product_images.image_id','=','images.id');
    	if($order_by=='termurah'){
    		$query = $query->orderBy('products.price','asc');
    	} else if($order_by=='termahal'){
            $query = $query->orderBy('products.price','desc');
        } else if($order_by=='terbaru'){
            $query = $query->orderBy('products.created_at','desc');
        }
    	return $query->get();
    }
    public function orderProducts1($order_by, $user_id) {
        $query = DB::table('products')
        ->join('product_images','products.id','=','product_images.product_id')
        ->join('images','product_images.image_id','=','images.id');
        if($order_by=='termurah'){
            $query = $query->orderBy('products.price','asc');
        } else if($order_by=='termahal'){
            $query = $query->orderBy('products.price','desc');
        } else if($order_by=='terbaru'){
            $query = $query->orderBy('products.created_at','desc');
        }
        return $query->get();
    }
}

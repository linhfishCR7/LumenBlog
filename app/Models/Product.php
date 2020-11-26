<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model {
   protected $fillable = ['id', 'name', 'type', 'rate', 'description','picture','color','price','sale_price','promotion','quantity','product_detail','pay_detail','policy_detail', 'deleted', 'created_at', 'created_by','updated_at','updated_by', 'deleted_at','deleted_by'];
   protected $table = 'product';
 
}
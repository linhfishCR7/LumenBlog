<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Blogs extends Model {
   protected $fillable = ['id', 'name', 'description', 'keyword', 'icon','favicon','is_active', 'deleted', 'created_at', 'created_by','updated_at','updated_by', 'deleted_at','deleted_by'];
   protected $table = 'blogs';
 
}
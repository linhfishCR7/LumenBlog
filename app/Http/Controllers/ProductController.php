<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Response;

class ProductController extends BaseController {

    public function index() {
        // $product = DB::select('select * from product');
        // if (empty($product)) {
        //     $arr = array('code' => 404, 'message' => 'No data found');
        //     echo json_encode($arr);
        // } else {
        //     $countallproduct = count($product);
        //     if ($countallproduct > 0) {
        //         return response()->json(array(
        //                     'code' => 200,
        //                     'data' => $product
        //                         ), 200);
        //     }
        // }
        $product = Product::all();
        return Response([
            'status'=> 'success',
            'code' => 200,
            'data' => $product
        ]);
    }

    public function create(Request $request) {
        $product = new Product;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->rate = $request->rate;
        $product->description = $request->description;
        $product->picture = $request->picture;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->promotion = $request->promotion;
        $product->quantity = $request->quantity;
        $product->product_detail = $request->product_detail;
        $product->pay_detail = $request->pay_detail;
        $product->policy_detail = $request->policy_detail;
        $product->deleted = $request->deleted;
        $product->created_at = $request->created_at;
        $product->created_by = $request->created_by;
        $product->updated_at = $request->updated_at;
        $product->updated_by = $request->updated_by;
        $product->deleted_at = $request->deleted_at;
        $product->deleted_by = $request->deleted_by;
        $datainsert = $product->save();
        if ($datainsert == 1) {
            $lastid = DB::getPdo()->lastInsertId();
            $product_inserted = DB::select('select * from product where id = ?', [$lastid]);
            return response()->json(array(
                        'code' => 200,
                        'status' => 'Add has been success',
                        // 'data' => $product_inserted
                            ), 200);
        }
        // $product = new product();
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->keyword = $request->keyword;
        // $product->icon = $request->icon;
        // $product->favicon = $request->favicon;
        // $product->is_active = $request->is_active;
        // $product->deleted = $request->deleted;
        // $product->created_at = $request->created_at;
        // $product->created_by = $request->created_by;
        // $product->updated_at = $request->updated_at;
        // $product->updated_by = $request->updated_by;
        // $product->deleted_at = $request->deleted_at;
        // $product->deleted_by = $request->deleted_by;
        // $product->save();
        // return Response([
        //     'status'=> 'success',
        //     'code' => 200,
        //     'data' => 'Data has been added success'
        // ]);
    }

    public function show($id) {
        $product = Product::find($id);
        $product_show = DB::select('select * from product where id = ?', [$id]);

        if (empty($product_show)) {
            $arr = array('code' => 404, 'message' => 'ID not found or invalid');
            echo json_encode($arr);
        } else {
            $count = count($product_show);
            if ($count == 1) {
                return response()->json(array(
                            'code' => 200,
                            'data' => $product
                                ), 200);
            }
        }
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $prod_data = DB::select('select * from product where id = ?', [$id]);
        if (empty($prod_data)) {
            $arr = array('code' => 404, 'message' => 'ID not found or invalid');
            echo json_encode($arr);
        } else {
            
            // $product->name = $request->input('name');
            // $product->description = $request->input('description');
            // $product->keyword = $request->input('keyword');
            // $product->icon = $request->input('icon');
            // $product->favicon = $request->input('favicon');
            // $product->is_active = $request->input('is_active');
            // $product->deleted = $request->input('deleted');
            // $product->created_at = $request->input('created_at');
            // $product->created_by = $request->input('created_by');
            // $product->updated_at = $request->input('updated_at');
            // $product->updated_by = $request->input('updated_by');
            // $product->deleted_at = $request->input('deleted_at');
            // $product->deleted_by = $request->input('deleted_by');
            $product->name = $request->input('name');
            $product->type = $request->input('type');
            $product->rate = $request->input('rate');
            $product->description = $request->input('description');
            $product->picture = $request->input('picture');
            $product->color = $request->input('color');
            $product->price = $request->input('price');
            $product->sale_price = $request->input('sale_price');
            $product->promotion = $request->input('promotion');
            $product->quantity = $request->input('quantity');
            $product->product_detail = $request->input('product_detail');
            $product->pay_detail = $request->input('pay_detail');
            $product->policy_detail = $request->input('policy_detail');
             $product->deleted = $request->input('deleted');
            $product->created_at = $request->input('created_at');
            $product->created_by = $request->input('created_by');
            $product->updated_at = $request->input('updated_at');
            $product->updated_by = $request->input('updated_by');
            $product->deleted_at = $request->input('deleted_at');
            $product->deleted_by = $request->input('deleted_by');
            $array = array('name' => $request->input('name'),
            'type' => $request->input('type'),
            'rate' => $request->input('rate'),
            'description' => $request->input('description'),
            'picture' => $request->input('picture'),
            'color' => $request->input('color'),
            'price' => $request->input('price'),
            'sale_price' => $request->input('sale_price'),
            'promotion' => $request->input('promotion'),
            'quantity' => $request->input('quantity'),
           'product_detail' => $request->input('product_detail'),
            'pay_detail' => $request->input('pay_detail'),
            'policy_detail' => $request->input('policy_detail'),
            'created_at' => $request->input('created_at'),
            'created_by' => $request->input('created_by'),
            'updated_at' => $request->input('updated_at'),
            'updated_by' => $request->input('updated_by'),
            'deleted_at' => $request->input('deleted_at'),
            'deleted_by' => $request->input('deleted_by'));
            $dataupdate = DB::table('product')->where('id', '=', $id)->update($array);
            $product_updated = DB::select('select * from product where id = ?', [$id]);

            if ($dataupdate == 1) {
                return response()->json(array(
                            'code' => 200,
                            'data' => $product_updated,
                            'message' => 'Data has updated success'
                                ), 200);
            }
            if ($dataupdate == 0) {
                return response()->json(array(
                            'code' => 200,
                            'data' => $product_updated,
                            'message' => 'Data already updated'
                                ), 200);
            }
        }
        


    }

    public function delete($id) {
        $datadelete = DB::table('product')->where('id', '=', $id)->delete();
        if ($datadelete == 1) {
            return response()->json(array(
                        'code' => 200,
                        'message' => 'Data deleted'
                            ), 200);
        }
        if ($datadelete == 0) {
            return response()->json(array(
                        'code' => 404,
                        'message' => 'ID not found or invalid'
                            ), 404);
        }
    }
}

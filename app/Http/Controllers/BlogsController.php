<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Response;

class BlogsController extends BaseController {

    public function index() {
        // $blogs = DB::select('select * from blogs');
        // if (empty($blogs)) {
        //     $arr = array('code' => 404, 'message' => 'No data found');
        //     echo json_encode($arr);
        // } else {
        //     $countallblogs = count($blogs);
        //     if ($countallblogs > 0) {
        //         return response()->json(array(
        //                     'code' => 200,
        //                     'data' => $blogs
        //                         ), 200);
        //     }
        // }
        $blogs = Blogs::all();
        return Response([
            'status'=> 'success',
            'code' => 200,
            'data' => $blogs
        ]);
    }

    public function create(Request $request) {
        $blogs = new Blogs;
        $blogs->name = $request->name;
        $blogs->description = $request->description;
        $blogs->keyword = $request->keyword;
        $blogs->icon = $request->icon;
        $blogs->favicon = $request->favicon;
        $blogs->is_active = $request->is_active;
        $blogs->deleted = $request->deleted;
        $blogs->created_at = $request->created_at;
        $blogs->created_by = $request->created_by;
        $blogs->updated_at = $request->updated_at;
        $blogs->updated_by = $request->updated_by;
        $blogs->deleted_at = $request->deleted_at;
        $blogs->deleted_by = $request->deleted_by;
        $datainsert = $blogs->save();
        if ($datainsert == 1) {
            $lastid = DB::getPdo()->lastInsertId();
            $blogs_inserted = DB::select('select * from blogs where id = ?', [$lastid]);
            return response()->json(array(
                        'code' => 200,
                        'data' => $blogs_inserted
                            ), 200);
        }
        // $blogs = new Blogs();
        // $blogs->name = $request->name;
        // $blogs->description = $request->description;
        // $blogs->keyword = $request->keyword;
        // $blogs->icon = $request->icon;
        // $blogs->favicon = $request->favicon;
        // $blogs->is_active = $request->is_active;
        // $blogs->deleted = $request->deleted;
        // $blogs->created_at = $request->created_at;
        // $blogs->created_by = $request->created_by;
        // $blogs->updated_at = $request->updated_at;
        // $blogs->updated_by = $request->updated_by;
        // $blogs->deleted_at = $request->deleted_at;
        // $blogs->deleted_by = $request->deleted_by;
        // $blogs->save();
        // return Response([
        //     'status'=> 'success',
        //     'code' => 200,
        //     'data' => 'Data has been added success'
        // ]);
    }

    public function show($id) {
        $blogs = Blogs::find($id);
        $blogs_show = DB::select('select * from blogs where id = ?', [$id]);

        if (empty($blogs_show)) {
            $arr = array('code' => 404, 'message' => 'ID not found or invalid');
            echo json_encode($arr);
        } else {
            $count = count($blogs_show);
            if ($count == 1) {
                return response()->json(array(
                            'code' => 200,
                            'data' => $blogs
                                ), 200);
            }
        }
    }

    public function update(Request $request, $id) {
        $blogs = Blogs::find($id);
        $prod_data = DB::select('select * from blogs where id = ?', [$id]);
        if (empty($prod_data)) {
            $arr = array('code' => 404, 'message' => 'ID not found or invalid');
            echo json_encode($arr);
        } else {
            $blogs->name = $request->input('name');
            $blogs->description = $request->input('description');
            $blogs->keyword = $request->input('keyword');
            $blogs->icon = $request->input('icon');
            $blogs->favicon = $request->input('favicon');
            $blogs->is_active = $request->input('is_active');
            $blogs->deleted = $request->input('deleted');
            $blogs->created_at = $request->input('created_at');
            $blogs->created_by = $request->input('created_by');
            $blogs->updated_at = $request->input('updated_at');
            $blogs->updated_by = $request->input('updated_by');
            $blogs->deleted_at = $request->input('deleted_at');
            $blogs->deleted_by = $request->input('deleted_by');

            $array = array('name' => $request->input('name'), 'description' => $request->input('description'),'keyword' => $request->input('keyword'),'icon' => $request->input('icon'),'favicon' => $request->input('favicon'),'is_active' => $request->input('is_active'),'deleted' => $request->input('deleted'),
            'created_at' => $request->input('created_at'),
            'created_by' => $request->input('created_by'),
            'updated_at' => $request->input('updated_at'),
            'updated_by' => $request->input('updated_by'),
            'deleted_at' => $request->input('deleted_at'),
            'deleted_by' => $request->input('deleted_by'));
            $dataupdate = DB::table('blogs')->where('id', '=', $id)->update($array);
            $blogs_updated = DB::select('select * from blogs where id = ?', [$id]);

            if ($dataupdate == 1) {
                return response()->json(array(
                            'code' => 200,
                            'data' => $blogs_updated,
                            'message' => 'Data updated'
                                ), 200);
            }
            if ($dataupdate == 0) {
                return response()->json(array(
                            'code' => 200,
                            'data' => $blogs_updated,
                            'message' => 'Data already updated'
                                ), 200);
            }
        }
        


    }

    public function delete($id) {
        $datadelete = DB::table('blogs')->where('id', '=', $id)->delete();
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

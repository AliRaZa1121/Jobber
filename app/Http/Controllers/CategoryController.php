<?php

namespace App\Http\Controllers;

use DB;
use App\Category;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use EmailTrait;
    use SlugTrait;
    use UploadTrait;
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.categories.list')->with('categories', Category::all());
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $data['category'] = new Category;
        $data['categories'] = Category::all();
        return view('admin.categories.form', $data);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug'] = $this->slugify($input['name']);
        $input['image'] = isset($input['profile_avatar'])?$input['profile_avatar']:null; 
        unset($input['profile_avatar_remove'], $input['_token'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if($input['image'] != null)
            {
                // uploadImage('image', name, 'folder', 'storage')
                $input['image'] = $this->uploadImage($input['image'], $input['name'] , '/uploads/categories/', 'public');
                
            }
            else{
                $input['image'] = '';
            }
            
            $category = Category::create($input);
            $notification = array(
                'message' => 'Category created!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Throwable $th) {
            $notification = array(
                // 'message' => $th->getMessage(),
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            DB::rollback();
        }
        return redirect('categories')->with($notification);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Category $category)
    {
        $data['category'] = $category;
        $data['categories'] = Category::all();
        return view('admin.categories.form', $data);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Category $category)
    {

        $input = $request->all();
        $input['slug'] = $this->slugify($input['name']);
        $input['image'] = isset($input['profile_avatar'])?$input['profile_avatar']:null; 
        unset($input['profile_avatar_remove'], $input['_token'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if($input['image'] != null)
            {
                // uploadImage('image', name, 'folder', 'storage')
                $input['image'] = $this->uploadImageUpdate($input['image'], $category , '/uploads/categories/', 'public');
                
            }
            else{
                $input['image'] = $category->image;
            }
            
            $category = $category->update($input);
            $notification = array(
                'message' => 'Category updated!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Throwable $th) {
            $notification = array(
                // 'message' => $th->getMessage(),
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            DB::rollback();
        }
        return redirect('categories')->with($notification);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Category $category)
    {
        $category->delete();
        $notification = array(
            'message' => 'Category deleted!',
            'alert-type' => 'success'
        );
        return redirect('categories')->with($notification);
    }
}

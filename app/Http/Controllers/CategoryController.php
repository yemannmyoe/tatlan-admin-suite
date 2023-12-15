<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
      
        $data = Category::all();
        return view('pages.category.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    // {
    //     $category = Category::create($request->all());
        
    //    if ($request->hasFile('category_image')) {
    //         $file_save = '/public/assets/img/';
    //         $category_image = $request->file('image');
    //         $image_name = $category_image->getClientOriginalName();
    //         $path = $request->file('category_image')->storeAs($file_save,$image_name);

    //         $category['category_image'] = $image_name;
    //    }


    //           $category->save();

    //        return redirect()->route('categories.index')->with('Added Successfully!');
    // }

    {
        // dd($request->all());

        $request->validate([
            'english_name' => ['required'],
            'myanmar_name' => ['required'],
            'category_image'=>['required']
        ]);

        $fn = time().'.'.$request->category_image->extension();
        $request->category_image->move(public_path('uploads'),$fn);

        $category = new Category;
        $category->english_name=$request->english_name;
        $category->myanmar_name=$request->myanmar_name;
        $category->category_image= $fn;
        
        $category->save();

        return redirect()->route('categories.index')->with('Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $category = Category::findOrFail($id);

        // return view('category.show', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findOrfail($id);
        return view('pages.category.edit', ['category'=>$category]);

  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

       
        {
            $request->validate([
                'english_name'=>['required'],
                'myanmar_name'=>['required']
               
            ]);

       

            $category = Category::find($id);
            $category->english_name = $request->english_name;
            $category->myanmar_name = $request->myanmar_name;

            if ($request->category_image) {
                $request->validate([
                    'category_image' => ['required','image']
                ]);
            unlink(public_path('uploads/'.$category->category_image));
            $fn = time().'.'.$request->category_image->extension();
            $request->category_image->move(public_path('uploads'),$fn);
            $category->category_image= $fn;
        }

            $category->update();

            return redirect()->route('categories.index')->with('success', 'updated successfully');
        }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrfail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'deleted successfully');
    }
}

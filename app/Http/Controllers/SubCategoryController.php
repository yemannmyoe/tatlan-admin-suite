<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::where(null)->orderby('published_date','desc')->orderby('created_at', 'desc')->paginate(10);
        $category = Category::all();
        $array = [];

        foreach($subcategories as $subcate){
            
                $data = [
                             "id" => $subcate->id,
                            "title" => $subcate->category,
                            "english_name" => $subcate->english_name,
                             "myanamr_name" => $subcate->myanamr_name,
                            "subcategory_image" => $subcate->subcategory_image,
                            "published_date" => $subcate->published_date
                           
                        ];
                array_push($array, $data);
                    }
         return view('pages.subcategory.index', compact('array'))->with('subcategories', $subcategories,'i', (request()->input('page',1)- 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderby('id', 'DESC')->get();
        $data = [
            'category' => $category,
           
        ];

        return view('pages.subcategory.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'category'=>['required'],
            'english_name'=>['required'],
            'myanmar_name'=>['required'],
            'subcategory_image'=>['required'],
            'published_date'=>['required']
            
        ]);


        $fn = time().'.'.$request->subcategory_image->extension();
        $request->subcategory_image->move(public_path('uploads'),$fn);

        $subcategories = new SubCategory;
        $subcategories->category=$request->category;
        $subcategories->english_name=$request->english_name;
        $subcategories->myanmar_name=$request->myanmar_name;
        $subcategories->subcategory_image= $fn;
        $subcategories->published_date=$request->published_date;


        $subcategories->save();

        return redirect()->route('subcategories.index')->with('Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategories=SubCategory::findOrfail($id);

        $category = Category::all();
        $format_published_date = $subcategories->published_date->format('Y-m-d');
       
        return view('pages.subcategory.edit', compact('subcategories','category' ,'format_published_date'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'category'=>['required'],
            'english_name'=>['required'],
            'myanmar_name'=>['required'],
            'published_date'=>['required']
            
        ]);


        $subcategories =SubCategory::find($id);
        $subcategories->category=$request->category;
        $subcategories->english_name=$request->english_name;
        $subcategories->myanmar_name=$request->myanmar_name;
        $subcategories->published_date=$request->published_date;


        
        if ($request->subcategory_image) {
            $request->validate([
                'subcategory_image' => ['required','image']
            ]);
        unlink(public_path('uploads/'.$subcategories->subcategory_image));
        $fn = time().'.'.$request->subcategory_image->extension();
        $request->subcategory_image->move(public_path('uploads'),$fn);
        $subcategories->subcategory_image= $fn;
    }
        
        $subcategories->update();

        return redirect()->route('subcategories.index')->with('Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrfail($id);
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'deleted successfully');
    }
}

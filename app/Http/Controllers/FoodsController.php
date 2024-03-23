<?php

 namespace App\Http\Controllers;
 use App\Models\Foods;
 use App\Models\Hall;
 use App\Models\OrderDetail;
 use DB;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function addFoods() {
        $halls = Hall::where('publication_status', 1)->get(); 
        return view('admin.foods.add-foods', [
            'halls' => $halls
        ]);
    } 

    

    public function report() {
        $ord =  DB::table('Order_Details')->get();
        $foods =  DB::table('foods')->get();
        $ordss =  DB::table('orders')->get();  
        $halls =  DB::table('halls')->get();  
        return view('admin.foods.report-foods',[
            'ord' => $ord,
            'ordss' => $ordss,
            'foods' => $foods,
            'halls' => $halls,
        ]);
    }

    protected function imageUploadFoodInfo($request) {
        $foodImage = $request->file('food_image');
        $fileType = $foodImage->getClientOriginalExtension();
        $imageName = $request->food_name.'.'.$fileType;
        $directory = 'food-images/';
        $imageUrl = $directory.$imageName;
        $foodImage->move($directory,$imageName);
        //Image::make($hallImage)->resize('200', '200')->save($imageUrl);
        return $imageUrl;
    }

    public function saveFoods(Request $request) {
        $foods = new Foods();
        $foods->food_name = $request->food_name;
        $foods->food_description = $request->food_description;
        $foods->hall_id = $request->hall_id;

        $imageUrl = $this->imageUploadFoodInfo($request);  
        $foods->food_image =$imageUrl;

        $foods->save(); 
        return redirect('/foods/add')->with('message','Foods Info Save Successfully');
    }

    public function manageFoods() {
        // $foods = Foods::all();
        // return view('admin.foods.manage-foods',[
        //     'foods' => $foods
        // ]); 

        $foods = DB::table('foods')
        ->join('halls', 'halls.id','=','foods.hall_id')
        ->select('foods.*','halls.hall_name')
        ->get();
        return view('admin.foods.manage-foods',[
            'foods' => $foods
        ]);
    }

    public function editFoods($id) {
        $food = Foods::find($id);
        $halls = Hall::where('id', $food->hall_id)->get();
        return view('admin.foods.edit-foods',['food'=>$food, 'halls' => $halls]);
 
    }
    

    public function updateFoods(Request $request) {
        $food = Foods::find($request->food_id);
        $food->food_name = $request->food_name;
        $food->food_description = $request->food_description; 

        $foodImage = $request->file('food_image');

        if($foodImage) {
            unlink($food->food_image);
            $imageUrl = $this->imageUploadFoodInfo($request);
            $food->food_image = $imageUrl; 
        }
        
        $food->save();

        return redirect('/foods/manage')->with('message','Foods Info Update Successfully');
    }
 
    public function deleteFoods($id) {
        $food = Foods::find($id);
        $food->delete();
        return redirect('/foods/manage')->with('message', 'Foods Info Deleted!');
        }
}














 
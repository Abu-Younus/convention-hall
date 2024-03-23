<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hall;
use Illuminate\Http\Request;
use DB;

class HallController extends Controller
{
    public function addHall() {
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.hall.add-hall', [
            'categories' => $categories
        ]);
    }

    protected function imageUploadHallInfo($request) {
        $hallImage = $request->file('hall_image');
        $fileType = $hallImage->getClientOriginalExtension();
        $imageName = $request->hall_name.'.'.$fileType;
        $directory = 'hall-images/';
        $imageUrl = $directory.$imageName;
        $hallImage->move($directory,$imageName);
        //Image::make($hallImage)->resize('200', '200')->save($imageUrl);
        return $imageUrl;
    }

    protected function basicHallInfoSave($request, $imageUrl) {
        $hall = new Hall();
        $hall->category_id = $request->category_id;
        $hall->hall_name = $request->hall_name;
        $hall->hall_capacity = $request->hall_capacity;
        $hall->hall_booking_price = $request->hall_booking_price;
        $hall->hall_location = $request->hall_location;
        $hall->hall_description = $request->hall_description;
        $hall->hall_image = $imageUrl;
        $hall->publication_status = $request->publication_status;
        $hall->save();
    }

    public function saveHall(Request $request) {
        $imageUrl = $this->imageUploadHallInfo($request);
        $this->basicHallInfoSave($request,$imageUrl);

        return redirect('/hall/add')->with('message', 'Hall Info Save Successfully!');
    }

    public function manageHall() {
        $halls = DB::table('halls')
            ->join('categories', 'categories.id','=','halls.category_id')
            ->select('halls.*','categories.category_name')
            ->get();
        return view('admin.hall.manage-hall',[
            'halls' => $halls
        ]);
    }

    public function unpublishedHall($id) {
        $hall = Hall::find($id);
        $hall->publication_status = 0;
        $hall->save();

        return redirect('/hall/manage')->with('message', 'Hall Info Unpublished!');
    }

    public function publishedHall($id) {
        $hall = Hall::find($id);
        $hall->publication_status = 1;
        $hall->save();

        return redirect('/hall/manage')->with('message', 'Hall Info Published!');
    }

    public function editHall($id) {
        $hall = Hall::find($id);
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.hall.edit-hall', [
            'hall' => $hall,
            'categories' => $categories
        ]);
    }

    public function updateBasicHallInfo($hall, $request, $imageUrl=null) {
        $hall->category_id = $request->category_id;
        $hall->hall_name = $request->hall_name;  
        $hall->hall_capacity = $request->hall_capacity; 
        $hall->hall_booking_price = $request->hall_booking_price;
        $hall->hall_location = $request->hall_location;
        $hall->hall_description = $request->hall_description;
        if($imageUrl) {
            $hall->hall_image = $imageUrl;
        }
        $hall->publication_status = $request->publication_status;
        $hall->save();
    }

    public function updateHall(Request $request) {
        $hallImage = $request->file('hall_image');
        $hall = Hall::find($request->hall_id);

        if($hallImage) {
            unlink($hall->hall_image);
            $imageUrl = $this->imageUploadHallInfo($request);
            $this->updateBasicHallInfo($hall, $request, $imageUrl);
        }
        else {
            $this->updateBasicHallInfo($hall, $request);
        }

        return redirect('/hall/manage')->with('message', 'Hall Info Updated!');
    }

    public function deleteHall($id) {
        $hall = Hall::find($id);
        unlink($hall->hall_image);
        $hall->delete();

        return redirect('/hall/manage')->with('message', 'Hall Info Deleted!');
    }
}

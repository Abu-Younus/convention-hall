<?php

namespace App\Http\Controllers;
use App\Models\Seats;
use App\Models\Hall;
use DB; 
use Illuminate\Http\Request;

class SeatsController extends Controller
{
    public function addSeats() {
        $halls = Hall::where('publication_status', 1)->get(); 
        return view('admin.seats.add-seats', [
            'halls' => $halls
        ]);
    } 

    public function saveSeats(Request $request) {
        $seats = new seats();
        $seats->seat_name = $request->seat_name;
        $seats->seat_description = $request->seat_description;
        $seats->hall_id = $request->hall_id;

        $imageUrl = $this->imageUploadSeatInfo($request);  
        $seats->seat_image =$imageUrl;
        $seats->save(); 
        return redirect('/seats/add')->with('message','seats Info Save Successfully');
    }



    protected function imageUploadSeatInfo($request) {
        $seatImage = $request->file('seat_image');
        $fileType = $seatImage->getClientOriginalExtension();
        $imageName = $request->seat_name.'.'.$fileType;
        $directory = 'seat-images/';
        $imageUrl = $directory.$imageName;
        $seatImage->move($directory,$imageName);
        //Image::make($hallImage)->resize('200', '200')->save($imageUrl);
        return $imageUrl;
    }





    public function manageSeats() {
        // $seats = seats::all();
        // return view('admin.seats.manage-seats',[
        //     'seats' => $seats
        // ]);
 

        $seats = DB::table('seats')
        ->join('halls', 'halls.id','=','seats.hall_id')
        ->select('seats.*','halls.hall_name')
        ->get();
        return view('admin.seats.manage-seats',[
            'seats' => $seats
        ]);
    }

    public function editSeats($id) {
        $seat = seats::find($id);
        $halls = Hall::where('id', $seat->hall_id)->get();
        return view('admin.seats.edit-seats',['seat'=>$seat, 'halls' => $halls]);
 
    }
    

    public function updateSeats(Request $request) {
        $seat = seats::find($request->seat_id);
        $seat->seat_name = $request->seat_name;
        $seat->seat_description = $request->seat_description; 

        $seatImage = $request->file('seat_image');

        if($seatImage) {
            unlink($seat->seat_image);
            $imageUrl = $this->imageUploadSeatInfo($request);
            $seat->seat_image = $imageUrl; 
        }


        $seat->save();

        return redirect('/seats/manage')->with('message','seats Info Update Successfully');
    }
 
    public function deleteSeats($id) {
        $seat = seats::find($id);
        $seat->delete();
        return redirect('/seats/manage')->with('message', 'seats Info Deleted!');
        }
}
 














 
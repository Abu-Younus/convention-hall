<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hall;
use App\Models\OrderDetail;
use App\Models\Foods;
use App\Models\Seats;
use Illuminate\Http\Request;
use DB;

class FrontEndController extends Controller
{
    public function index() {
        $categories = Category::where('publication_status', 1)->get();
        $newHalls = Hall::where('publication_status', 1)
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();
        $featuredHalls = Hall::where('publication_status', 1)
            ->orderBy('id', 'ASC')
            ->take(4)
            ->get();
        $halls = Hall::where('publication_status', 1)->get();
        return view('front-end.home.home',[
            'categories' => $categories,
            'newHalls' => $newHalls,
            'featuredHalls' => $featuredHalls,
            'halls' => $halls
        ]);
    }

    
    public function allfoods() {   
        $categories = Category::where('publication_status', 1)->get();
        $newHalls = Hall::where('publication_status', 1)
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();
        $featuredHalls = Hall::where('publication_status', 1)
            ->orderBy('id', 'ASC')
            ->take(4)
            ->get();
        $halls = Hall::where('publication_status', 1)->get();
        $allfoods = DB::table('foods')
        ->join('halls', 'halls.id','=','foods.hall_id')
        ->select('foods.*','halls.*')->get();

        return view('front-end.food.allfoods-food',[
            'categories' => $categories,
            'newHalls' => $newHalls,
            'featuredHalls' => $featuredHalls,
            'halls' => $halls,
            'allfoods' => $allfoods,
        ]);
    } 


    public function allseats() {   
        $categories = Category::where('publication_status', 1)->get();
        $newHalls = Hall::where('publication_status', 1)
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();
        $featuredHalls = Hall::where('publication_status', 1)
            ->orderBy('id', 'ASC')
            ->take(4)
            ->get();
        $halls = Hall::where('publication_status', 1)->get();
        $allseats = DB::table('seats')
        ->join('halls', 'halls.id','=','seats.hall_id')
        ->select('seats.*','halls.*')->get();

        return view('front-end.food.allseats-food',[
            'categories' => $categories,
            'newHalls' => $newHalls,
            'featuredHalls' => $featuredHalls,
            'halls' => $halls,
            'allseats' => $allseats,
        ]);
    } 






    public function searchResult(Request $request) {
        $search = $request->input('search');
        $categories = Category::where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        $searchHalls = Hall::where('hall_name', 'like', "%$search%")->get();
        return view('front-end.search.search-result',[
            'categories'    =>  $categories,
            'halls'    =>  $halls,
            'searchHalls'  =>  $searchHalls
        ]);
    }

    public function categoryHall($id) {
        $category = Category::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $categoryHalls = Hall::where('category_id', $category->id)
            ->where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();

        return view('front-end.category.category-hall',[
            'category' => $category,
            'categories' => $categories,
            'categoryHalls' => $categoryHalls,
            'halls' => $halls
        ]);
    }

    public function viewHall($id) {
        $hall = Hall::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $relatedHalls = Hall::where('category_id', $hall->category_id)
            ->where('publication_status', 1)->get();
        $halls = Hall::where('publication_status', 1)->get();
        $orderss= OrderDetail::where('hall_id', $id)->get(); 
        $foods= Foods::where('hall_id', $id)->get(); 
        $seats= Seats::where('hall_id', $id)->get();
        
        return view('front-end.hall.view-hall', [
            'hall' => $hall,
            'relatedHalls' => $relatedHalls,
            'categories' => $categories,
            'halls' => $halls,
            'orderss' => $orderss,
            'foods' => $foods,
            'seats' => $seats, 
        ]);
    }
}

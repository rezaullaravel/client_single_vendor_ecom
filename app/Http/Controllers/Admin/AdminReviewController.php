<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReviewController extends Controller
{
    //all review
    public function index(){
        $reviews = Review::orderBy('id','desc')->get();
        return view('admin.review.index',compact('reviews'));
    }//end method
}

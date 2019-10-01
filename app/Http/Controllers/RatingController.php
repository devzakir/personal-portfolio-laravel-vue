<?php

namespace App\Http\Controllers;


use Session;
use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings= Rating::orderBy('created_at','desc')->paginate(20);
        return view('admin.rating.index', ['ratings' => $ratings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('admin.rating.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'rating' => 'required',
            'feedback' => 'required',
        ]);

        $rating = Rating::create($request, [
            'name' => $request->name,
            'user_id' => $request->user_id,
            'product_id' => $request->product_i,
            'avatar' => 'uploads/avatar/',
            'rating' => $request->rating,
            'feedback' => $request->feedbac,
        ]);
 
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('/uploads/rating/', $avatar_new_name);
            $rating->avatar = '/uploads/rating/' . $avatar_new_name;
            $rating->save();
        }

        Session::flash('success', 'Rating Added Successfully');
        return redirect()->route('rating.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating, $id)
    {
        $rating  = Rating::find($id);
        return view('admin.rating.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating,$id)
    {
        $rating = Rating::find($id);
        return view('admin.rating.edit', ['rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'rating' => 'required',
            'feedback' => 'required',
        ]);

        $rating = Rating::find($id);

        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('/uploads/rating/', $avatar_new_name);
            $rating->avatar = '/uploads/rating/' . $avatar_new_name;
            $rating->save();
        }

        $rating->name = $request->name;
        $rating->user_id = $request->user_id;
        $rating->product_id = $request->product_i;
        $rating->rating = $request->rating;
        $rating->feedback = $request->feedbac;
        $rating->save();

        Session::flash('success', 'Rating Updated Successfully');
        return redirect()->route('rating.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating,$id)
    {
        $rating = Rating::find($id);
        if($rating){
            if(file_exists(public_path($rating->avatar))){
                unlink($rating->avatar);
            }
            $rating->delete();
            Session::flash('success', 'Rating Deleted Successfully');
        } else {
            Session::flash('success', 'Rating Not Deleted');
        }

        return redirect()->route('rating.index');
    }
}

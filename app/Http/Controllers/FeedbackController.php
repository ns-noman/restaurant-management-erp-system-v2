<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Carbon\Carbon;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['feedbacks'] = Feedback::latest()->whereNull('deleted_at')->get();
        return view('admin.feedback.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['feedback'] = Feedback::find($id);
        return view('admin.feedback.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Feedback::find($id);
        $product->status = $request->status;
        $product->save();

        return redirect()->route('adminfeedback.index')
                        ->with('success','Feedback Status change successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Feedback::find($id);
        $product->deleted_at = now();
        $product->save();

        return redirect()->route('adminfeedback.index')
                        ->with('success','Feedback deleted successfully');
    }
    
    
    public function apifeedback()
    {
        $feedbacks = Feedback::latest()
                        ->whereNull('deleted_at')
                        ->whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->get();
        
        
        $feedback = $feedbacks->map(function ($item, $key) {
            
            return [
                'id'             => $item->id,
                'name'           => $item->name,
                'mobile'         => $item->mobile,
                'email'          => $item->email,
                'rating'         => $item->rating,
                'q_food'         => $item->q_food,
                'cleanliness'    => $item->cleanliness,
                'q_service'      => $item->q_service,
                'friendliness'   => $item->friendliness,
                'speed'          => $item->speed,
                'apprearance'    => $item->apprearance,
                'image'          => $item->image,
                'comments'       => $item->comments,
                'status'         => $item->status,
                'created_at'     => $item->created_at->format('d-M-Y H:i: A'),
                'updated_at'     => $item->updated_at->format('d-M-Y H:i: A'),
                'timeago'        => $item->created_at->diffForHumans()
            ];
        });
       
        return response()->json(['feedback' => $feedback], 200);
    }
    
    
    
    
}

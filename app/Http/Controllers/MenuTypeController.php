<?php

namespace App\Http\Controllers;

use App\Models\MenuType;
use Illuminate\Http\Request;

class MenuTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menutypes'] = MenuType::latest()->get();
        return view('admin.menutypes.index',$data);
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
        $request->validate([
            'name' => 'required',
            'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('icon')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['icon'] = "$profileImage";
        }

        MenuType::create($input);

        return redirect()->route('menutype.index')
                        ->with('success','MenuType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuType  $menuType
     * @return \Illuminate\Http\Response
     */
    public function show(MenuType $menuType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuType  $menuType
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuType $menuType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuType  $menuType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuType $menuType,$id)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('icon')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['icon'] = "$profileImage";
        }
        else{
            unset($input['icon']);
        }

        MenuType::find($id)->update($input);

        return redirect()->route('menutype.index')
                        ->with('success','Food Menu Type Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuType  $menuType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuType $menuType,$id)
    {
        MenuType::find($id)->delete();

        return redirect()->route('menutype.index')
                        ->with('success','Food Menu Type deleted successfully');
    }
}

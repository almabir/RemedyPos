<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyDetails = Setting::first();
        return view('settings.settings', [
            'company' => $companyDetails,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'company' => 'required',
            'propitor' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.$request->logo->extension();  
        $request->logo->move(public_path('images'), $imageName);
        $ifExists = Setting::all();
        if(count($ifExists) > 0){
            DB::table('settings')
                ->update(
                [
                    'company' => $request->company, 
                    'propitor' => $request->propitor,
                    'email' => $request->email,
                    'address' => $request->address,
                    'website' => $request->website,
                    'mobile' => $request->mobile,
                    'logo' => $imageName,
                ],
            ); 
        }else{
            DB::table('settings')
            ->insert(
                [
                    'company' => $request->company, 
                    'propitor' => $request->propitor,
                    'email' => $request->email,
                    'address' => $request->address,
                    'website' => $request->website,
                    'mobile' => $request->mobile,
                    'logo' => $imageName,
                ],
            );
        }
               
        return redirect()->route('settings')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

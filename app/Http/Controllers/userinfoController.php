<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\info;

class userinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $views = info::orderBy('created_at','desc')->paginate(5);
        return view('userinfo.show',compact('views'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'identity' =>'required',
            'ptclNo' =>'required',
            'mobileNo' =>'required',
        
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->errors());          
        }
     
        $info = new info;
        $info->name = $request->input('name');
        $info->identity = $request->input('identity');
        $info->ptclNo = $request->input('ptclNo');
        $info->mobileNo = $request->input('mobileNo');
        if($info->save()){

            return redirect()->back()->with('success',' Data is successfull Inserted .');
        }
        else{
            return redirect()->back()->with('error',' Data is not Insert, Something Wrong .');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            if($info = info::findorFail($id)){
                
                return view('userinfo.edit')->with('info',$info);
            }
            else{
                return redirect()->back()->with('error',' not find your Record, there are some Errors');  
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the geting Record for editing.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'identity' =>'required',
                'ptclNo' =>'required',
                'mobileNo' =>'required',
            
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error',$validator->errors());          
            }
        
            $info = info::find($id);
            $info->name = $request->input('name');
            $info->identity = $request->input('identity');
            $info->ptclNo = $request->input('ptclNo');
            $info->mobileNo = $request->input('mobileNo');
            if($info->save()){

                return redirect()->back()->with('success',' Data is successfull Updated .');
            }
            else{
                return redirect()->back()->with('error',' Data is not Update, Something Wrong .');
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' Data is not Update, Something Wrong .');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $info = info::find($id);
            if($info){
                
                if($info->delete()){
                    return redirect()->back()->with('success', 'Record Removed');
                }
                else{
                    
                    return redirect()->back()->with('error', 'NOT Record Removed !!!');
                }
            }
            else{
                return redirect()->back()->with('error', 'Record NOT Found !!!');  
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',' something wrong with the deleting info info.');
        }
    }
}

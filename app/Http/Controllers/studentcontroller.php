<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
        return view('students.index',compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'price' => 'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect('add-product')
                        ->withErrors($validator)
                        ->withInput();
        }
        $student = new student;
        $student->name =$request->input('name');
        $student->description =$request->input('description');
        $student->price =$request->input('price');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/product/', $filename);
            $student->image = $filename;
        }
        $student->save();
        return redirect()->back()->with('status','product Added Succesfully'); 
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
        $student = student::find($id);
        return view('students.edit',compact('student'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect('add-product')
                        ->withErrors($validator)
                        ->withInput();
        }
        $student = student::find($id);
        $student->name =$request->input('name');
        $student->description =$request->input('description');
        $student->price =$request->input('price');
        if($request->hasfile('image')){
           $destination = 'uploads/product/'.$student->image;
           if(File::exists($destination))
           {
            File::delete($destination);
           }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/product/', $filename);
            $student->image = $filename;
        }
        $student->update();
        return redirect()->back()->with('status','product Updated Succesfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::find($id);
        $destination = 'uploads/product/'.$student->image;
        if(File::exists($destination))
        {

         File::delete($destination);
        }
        $student->delete();
        return redirect()->back()->with('status','product Deleted Succesfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\addUser;
use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Session;


class DatabaseController extends Controller
{
    public function addUser()
    {
        return view('addUser');
    }
    public function registarUser(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'

        ]);

        $employee = new addUser();

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->save();

        echo "<pre>";
        print_r($request->all());
        return redirect('/');
    }
    public function login()
    {

        return view('login');

    }
    public function loginData(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $loginCheck = addUser::where('email', $request->email)->where('password', $request->password)->first();


        if ($loginCheck) {

            echo "<pre>";

            session()->put('employee_id', $loginCheck->employeeId);
            session()->put('name', $loginCheck->name);
            echo session()->get('employee_id');

            return redirect('/');
        } else {
            echo "wrong";
        }


    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
    public function addimage()
    {
        if (session()->has('employee_id')) {
            return view('imageUpload');
        } else {
            return redirect("/");
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required'
        ]);
        $images = array();
        // echo "<pre>";
        // print_r($request->file("images"));


        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                $fileName = time() . "-test-$key." . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads', $fileName);
                $images[$key] = $fileName;


            }
        }


        // echo "<pre>";
        // print_r($images);


        $imageName = implode('|', $images);


        echo $imageName;
        $DBImage = new ImageModel();
        $DBImage->employee_id = session()->get("employee_id");
        $DBImage->image_name = $imageName;
        $DBImage->save();

        return redirect('show');


    }

    public function show()
    {

        $loginCheck = ImageModel::where('employee_id','=',session()->get('employee_id'))->get();
        // $imageName = $loginCheck->image_name;
        // $imageArray = array();
        // $imageArray = explode('|', $imageName);

        // echo "<pre>";
        // print_r($loginCheck[0]->image_name);
        $imageArray=array();
        foreach($loginCheck as $key=>$singleImageCollect){
         $imageArray[$key]=$singleImageCollect->image_name;
        }

        // echo "<pre>";
        // print_r($imageArray);
        
        $imageStr=implode('|',$imageArray);

        // echo $imageStr;

        $imageHouse=explode('|',$imageStr);


        // echo "<pre>";
        // print_r($imageHouse);


        $data = compact('imageHouse');

        return view('showimage')->with($data);
    }
}
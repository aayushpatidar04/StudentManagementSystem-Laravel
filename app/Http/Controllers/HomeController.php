<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crud;
use Illuminate\Support\Facades\Session;
use App\Models\Countries;
use App\Models\states;
use App\Models\cities;
use App\Models\classes;
use App\Models\student_marks;


class HomeController extends Controller
{
    public function manage_user(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admin'){
                return view('manage_user');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function manage_user_admission(){
        if(Session::has('user')){
            return view('manage_user_admission');
        }else{
            return redirect()->route('login');
        }
    }

    public function manage_admission(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admin'){
                return view('manage_admission');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function manage_teacher(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admin'){
                return view('manage_teacher');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function assign(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admin'){
                return view('assign');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function saveassign(Request $request){
        $subject = $request->subject;
        $row =  classes::where('class', $request->class)->first();
        $row->$subject = $request->teacher;
        $row->save();
        return redirect()->route('manage_teacher');

    }

    public function manage_student(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admin'){
                return view('manage_student');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function manage_student_admission(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admission'){
                return view('manage_student_admission');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function manage_student_marks(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='teacher'){
                return view('manage_student_marks');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function read($id){
        if(Session::has('user')){
            return view('read', compact('id'));
        }else{
            return redirect()->route('login');
        }
    }

    public function update($id){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admin'){
                return view('update', compact('id'));
            }else{
                return redirect()->route('login');
            }        
        }else{
            return redirect()->route('login');
        }
    }

    public function saveupdate(Request $request){
        $user = crud::where('email', $request->email)->first();
        $user->name = $request->name;
        $country = Countries::where('id', $request->country)->first();
        $country = json_decode($country);
        $user->country = $country->name;
        $state = states::where('s_id', $request->state)->first();
        $state = json_decode($state);
        // $user->state = $state->state;
        $city = cities::where('c_id', $request->city)->first();
        $city = json_decode($city);
        $user->city = $city->city;
        $user->save();
        return redirect()->route('manage_user');
    }

    public function updatestudent($id){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admin'){
                return view('updatestudent', compact('id'));
            }else{
                return redirect()->route('login');
            }        
        }else{
            return redirect()->route('login');
        }
    }

    public function updatestudentmarks($id){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='teacher'){
                return view('updatestudentmarks', compact('id'));
            }else{
                return redirect()->route('login');
            }        
        }else{
            return redirect()->route('login');
        }
    }

    public function updatestudentadmission($id){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admission'){
                return view('updatestudentadmission', compact('id'));
            }else{
                return redirect()->route('login');
            }        
        }else{
            return redirect()->route('login');
        }
    }

    public function saveupdatestudent(Request $request){
        $user = crud::where('email', $request->email)->first();
        $user->rollno = $request->roll;
        $user->name = $request->name;
        $user->class = $request->class;
        $user->section = $request->section;
        $country = Countries::where('id', $request->country)->first();
        $country = json_decode($country);
        $user->country = $country->name;
        $state = states::where('s_id', $request->state)->first();
        $state = json_decode($state);
        // $user->state = $state->state;
        $city = cities::where('c_id', $request->city)->first();
        $city = json_decode($city);
        $user->city = $city->city;
        $user->save();
        return redirect()->route('manage_student');
    }

    public function savemarks(Request $request){
        $student = student_marks::where('email', $request->email)->first();
        if($request->physics){
            $student->physics = $request->physics;
        }
        if($request->chemistry){
            $student->chemistry = $request->chemistry;
        }
        if($request->maths){
            $student->maths = $request->maths;
        }
        if($request->science){
            $student->science = $request->science;
        }
        if($request->hindi){
            $student->hindi = $request->hindi;
        }
        if($request->english){
            $student->english = $request->english;
        }
        $student->save();
        return redirect()->route('manage_student_marks');
    }

    public function saveupdatestudentadmission(Request $request){
        $user = crud::where('email', $request->email)->first();
        $user->rollno = $request->roll;
        $user->name = $request->name;
        $user->class = $request->class;
        $user->section = $request->section;
        $country = Countries::where('id', $request->country)->first();
        $country = json_decode($country);
        $user->country = $country->name;
        $state = states::where('s_id', $request->state)->first();
        $state = json_decode($state);
        // $user->state = $state->state;
        $city = cities::where('c_id', $request->city)->first();
        $city = json_decode($city);
        $user->city = $city->city;
        $user->save();
        return redirect()->route('manage_user_admission');
    }

    public function useraccount(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admin'){
                return view('useraccount');
            }else{
                return redirect()->route('login');
            }        
        }else{
            return redirect()->route('login');
        }
    }

    public function useraccount_admission(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='admission'){
                return view('useraccount_admission');
            }else{
                return redirect()->route('login');
            }        
        }else{
            return redirect()->route('login');
        }
    }

    public function useraccount_teacher(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='teacher'){
                return view('useraccount_teacher');
            }else{
                return redirect()->route('login');
            }        
        }else{
            return redirect()->route('login');
        }
    }

    public function useraccount_student(){
        if(Session::has('user')){
            $user = Session::get('user');
            if($user->role=='student'){
                return view('useraccount_student');
            }else{
                return redirect()->route('login');
            }         
        }else{
            return redirect()->route('login');
        }
    }

    public function change($id, Request $request){
        $row = crud::find($id);
        $s = student_marks::find($row->email);
        \Log::info($s);
        
        if(isset($request->teacher_btn_set)){
            $row->role = 'teacher';
            $row->save();
            return redirect()->route('manage_user');
        }


        if(isset($request->student_btn_set)){
            $row->role = 'student';
            $row->save();
            if($s == NULL){
                $user = new student_marks;
                $user->name = $row->name;
                $user->email = $row->email;
                $user->save();
            }
            return redirect()->route('manage_user');
        }

        if(isset($request->admission_btn_set)){
            $row->role = 'admission';
            $row->save();
            return redirect()->route('manage_user');
        }

        
    }

    public function delete($id){
        $row = crud::find($id);
        $row->delete();
        return redirect()->route('manage_user')->with('success', 'Deleted successfully!');
    }

    public function states_by_country(Request $request){
        $state = states::where('country_id', $request->country_id)->get();
        return response(json_decode($state));

    }

    public function cities_by_state(Request $request){
        $city = cities::where('state_id', $request->state_id)->get();
        return response(json_decode($city));
    }
}

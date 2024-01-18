<?php
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;
use App\Models\classes;
use App\Models\Countries;
use App\Models\states;
use App\Models\cities;
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>	   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">



<nav class="navbar navbar-expand bg-dark navbar-dark" id="nav1">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item" id="brand">
                <a class="navbar-brand" href="{{Route('login')}}" >Student CRUD System</a>
            </li>
            <li class="nav-item" id="hm">
                <a class="nav-link ms-3 active" href="{{ Route('admin') }}">Home</a>
            </li>
            <li class="nav-item" id="hmt">
                <a class="nav-link ms-3 active" href="{{ Route('teacher') }}">Home</a>
            </li>
            <li class="nav-item" id="hma">
                <a class="nav-link ms-3 active" href="{{ Route('admission') }}">Home</a>
            </li>
            <li class="nav-item" id="hms">
                <a class="nav-link ms-3 active" href="{{ Route('student') }}">Home</a>
            </li>
            <li class="nav-item" id="lgin">
                <a class="nav-link ms-3" href="{{ Route('login') }}" >Login</a>
            </li>
            <li class="nav-item" id="reg">
                <a class="nav-link ms-3" href="{{ Route('register') }}">Register</a>
            </li>
            <li class="nav-item" id="mu">
                <a class="nav-link ms-3" href="{{ Route('manage_user') }}">Manage User</a>
            </li>
            <li class="nav-item" id="adm">
                <a class="nav-link ms-3" href="{{ Route('manage_admission') }}">Manage Admission </a>
            </li>
            <li class="nav-item" id="tec">
                <a class="nav-link ms-3" href="{{ Route('manage_teacher') }}" >Manage Teacher</a>
            </li>
            <li class="nav-item" id="mua">
                <a class="nav-link ms-3" href="{{ ('manage_user_admission') }}">Manage User</a>
            </li>
            <li class="nav-item" id="std">
                <a class="nav-link ms-3" href="{{ Route('manage_student') }}">Manage Student</a>
            </li>
            <li class="nav-item" id="msa">
                <a class="nav-link ms-3" href="{{ Route('manage_student_admission') }}">Manage Student</a>
            </li>
            <li class="nav-item" id="msm">
                <a class="nav-link ms-3" href="{{ Route('manage_student_marks') }}">Manage Student Marks</a>
            </li>
        </ul>

        <ul class="navbar-nav justify-content-end">    
            <li calss="nav-item" id="prf">
                <a class="nav-link ms-3" href="{{ ('useraccount') }}"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li calss="nav-item" id="prfa">
                <a class="nav-link ms-3" href="{{ Route('useraccount_admission') }}"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li calss="nav-item" id="prfs">
                <a class="nav-link ms-3" href="{{ Route('useraccount_student') }}"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li calss="nav-item" id="prft">
                <a class="nav-link ms-3" href="{{ Route('useraccount_teacher') }}"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li class="nav-item" id="lgout">
                <a class="nav-link ms-3" href="{{ Route('logout') }}"><i class="fa fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-inverse bg-dark navbar-dark" id="nav2">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <a class="navbar-brand" href="" >Student CRUD System</a>
        </ul>
        <ul class="navbar-nav justify-content-end">
            <li>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <i class="fa fa-bars"></i>                       
                </button>
            </div>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav justify-content-end">
            <li class="nav-item" id="hm">
                <a class="nav-link active ms-3" href="{{ Route('admin') }}">Home</a>
            </li>
            <li class="nav-item" id="hmt">
                <a class="nav-link ms-3 active" href="{{ Route('teacher') }}">Home</a>
            </li>
            <li class="nav-item" id="hma">
                <a class="nav-link ms-3 active" href="{{ Route('admission') }}">Home</a>
            </li>
            <li class="nav-item" id="lgin">
                <a class="nav-link ms-3" href="{{ Route('login') }}" >Login</a>
            </li>
            <li class="nav-item" id="reg">
                <a class="nav-link ms-3" href="{{ Route('register') }}">Register</a>
            </li>
            <li class="nav-item" id="mu">
                <a class="nav-link ms-3" href="{{ Route('manage_user') }}">Manage User</a>
            </li>
            <li class="nav-item" id="adm">
                <a class="nav-link ms-3" href="{{ Route('manage_admission') }}">Manage Admission </a>
            </li>
            <li class="nav-item" id="tec">
                <a class="nav-link ms-3" href="{{ Route('manage_teacher') }}" >Manage Teacher</a>
            </li>
            <li class="nav-item" id="mua">
                <a class="nav-link ms-3" href="{{ Route('manage_user_admission') }}">Manage User</a>
            </li>
            <li class="nav-item" id="std">
                <a class="nav-link ms-3" href="{{ Route('manage_student') }}">Manage Student</a>
            </li>
            <li class="nav-item" id="msa">
                <a class="nav-link ms-3" href="{{ Route('manage_student_admission') }}">Manage Student</a>
            </li>
            <li class="nav-item" id="msm">
                <a class="nav-link ms-3" href="{{ Route('manage_student_marks') }}">Manage Student Marks</a>
            </li>
            <li class="nav-item" id="lgout">
                <a class="nav-link ms-3" href="{{ Route('logout') }}"><i class="fa fa-sign-out"></i>Logout</a>
            </li>
            <li calss="nav-item" id="prfa">
                <a class="nav-link ms-3" href="{{ Route('useraccount_admission') }}"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li calss="nav-item" id="prfs">
                <a class="nav-link ms-3" href="{{ Route('useraccount_student') }}"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li calss="nav-item" id="prft">
                <a class="nav-link ms-3" href="{{ Route('useraccount_teacher') }}"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li calss="nav-item" id="prf">
                <a class="nav-link ms-3" href="{{ ('useraccount') }}"><i class="fa fa-user"></i>Profile</a>
            </li>
          </ul>
        </div>
    </div>
</nav>

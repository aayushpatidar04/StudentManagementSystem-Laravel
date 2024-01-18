@include('layouts.navbar')



<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            #lgin{
                display:none;
            }
            #reg{
                display:none;
            }
            #brand{
                pointer-events: none;
                cursor: default;
            }
            #mua{
                display:none;
            }
            #mu{
                display:none;
            }
            #tec{
                display:none;
            }
            #adm{
                display:none;
            }
            #msa{
                display:none;
            }
            #std{
                display:none;
            }
            #hm{
                display:none;
            }
            #hma{
                display:none;
            }
            #hms{
                display:none;
            }
            #prf{
                display:none;
            }
            #prfa{
                display:none;
            }
            #prfs{
                display:none;
            }
            @media screen and (max-width: 767px){
                #nav1{
                    display: none;
                }
            }
            @media screen and (min-width:768px) {
                #nav2{
                    display: none;
                }  
            }
        </style>
    </head>
    <body>
        
        <div class="container">
            <h1 class="mt-3 text-center">Students Details</h1>
        </div>
        <br><br>
        <?php
        $crud = \DB::table('crud')->where('role', 'student')->get();
        ?>
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    @foreach($crud as $one)
                    <tr>
                        <td>{{$one->id}}</td>
                        <td>{{$one->email}}</td>
                        <td>{{$one->role}}</td>
                    </tr>
                    @endforeach
                </thead>
            
        </div>
    </body>
</html>
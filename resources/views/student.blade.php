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
            #std{
                display:none;
            }
            #mus{
                display:none;
            }
            #msa{
                display:none;
            }
            #tec{
                display:none;
            }
            #adm{
                display:none;
            }
            #mu{
                display:none;
            }
            #msm{
                display:none;
            }
            #mua{
                display:none;
            }
            #hm{
                display:none;
            }
            #hma{
                display:none;
            }
            #hmt{
                display:none;
            }
            #prft{
                display:none;
            }
            #prfa{
                display:none;
            }
            #prf{
                display:none;
            }
            
            @media screen and (max-width: 767px){
                #nav1{
                    display:none;
                }
                #t1 thead {
                    display: none;
                }
                #t1 tr {
                    display: flex;
                    flex-direction: column;
                    margin-bottom: 15px;
                    padding: 10px;
                    border-radius: 4px;
                    background-color: #fff;
                    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);
                }
                #t1 tbody tr:nth-child(odd) {
                    background-color: #fff;
                }
                #t1 td {
                  padding: 0.25rem;
                }
                #t1 td:nth-child(1) {
                    font-weight: bold;
                    font-size: 1.2em;
                }
                #t1 td:nth-child(2)::before {
                    content: "Email: ";
                }
                #t1 td:nth-child(3)::before {
                    content: "Role: ";
                }
                #t1 td::before {
                    font-weight: bold;
                }

                #t2 thead {
                    display: none;
                }
                #t2 tr {
                    display: flex;
                    flex-direction: column;
                    margin-bottom: 15px;
                    padding: 10px;
                    border-radius: 4px;
                    background-color: #fff;
                    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);
                }
                #t2 tbody tr:nth-child(odd) {
                    background-color: #fff;
                }
                #t2 td {
                  padding: 0.25rem;
                }
                #t2 td:nth-child(1) {
                    font-weight: bold;
                    font-size: 1.2em;
                }
                #t2 td:nth-child(2)::before {
                    content: "Physics: ";
                }
                #t2 td:nth-child(3)::before {
                    content: "Chemistry: ";
                }
                #t2 td:nth-child(4)::before {
                    content: "Math: ";
                }
                #t2 td:nth-child(5)::before {
                    content: "Science: ";
                }
                #t2 td:nth-child(6)::before {
                    content: "English: ";
                }
                #t2 td:nth-child(7)::before {
                    content: "Hindi: ";
                }
                #t2 td::before {
                    font-weight: bold;
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
            <h1 class="mt-3 text-center">Students Detail.</h1>
        </div>
        <br><br>
        <div class="container">
            <?php
                $user = Session::get('user');
                $student = \DB::table('student_marks')->where('email',$user->email)->first();
            ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Role</th>
                    </thead>
                    <tbody>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                    </tbody>
                </table>
        </div>
        <br><br><br>
        <div class="container">
            <h2>Marksheet</h2>
        </div>
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Name</th>
                    <th>Physics</th>
                    <th>Chemistry</th>
                    <th>Maths</th>
                    <th>Science</th>
                    <th>Hindi</th>
                    <th>English</th>
                </thead>
                <tbody>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->physics }}</td>
                    <td>{{ $student->chemistry }}</td>
                    <td>{{ $student->maths }}</td>
                    <td>{{ $student->science }}</td>
                    <td>{{ $student->hindi }}</td>
                    <td>{{ $student->english }}</td>
                </tbody>
            </table>
        </div>

    </body>
</html>
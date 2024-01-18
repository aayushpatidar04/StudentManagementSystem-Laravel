@include('layouts.navbar')



<!DOCTYPE html>
<html>
    <head>
        <title>Manage User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

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
            #msa{
                display:none;
            }
            #msm{
                display:none;
            }
            #hmt{
                display:none;
            }
            #hma{
                display:none;
            }
            #hms{
                display:none;
            }
            #prft{
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
                    display:none;
                }
                table thead {
                    display: none;
                }
                table tr {
                    display: flex;
                    flex-direction: column;
                    margin-bottom: 15px;
                    padding: 10px;
                    border-radius: 4px;
                    background-color: #fff;
                    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);
                }
                table tbody tr:nth-child(odd) {
                    background-color: #fff;
                }
                table td {
                  padding: 0.25rem;
                }
                table td:nth-child(1) {
                    font-weight: bold;
                    font-size: 1.2em;
                }
                table td:nth-child(2)::before {
                    content: "Email: ";
                }
                table td:nth-child(3)::before {
                    content: "Role: ";
                }
                
                table td::before {
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
            <h1 class="mt-3 text-center">Users of Student CRUD System.</h1>
        </div>
        <br><br>
        <?php
        $crud = \DB::table('crud')->where('role', '!=', 'admin')->get();
        ?>
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Change Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crud as $one)
                    <tr class="text-center">
                        <td>{{$one->id}}</td>
                        <td>{{$one->email}}</td>
                        <td>{{$one->role}}</td>
                        <td><a href="{{ Route('read',['id'=>$one->id]) }}" class="btn btn-secondary" title="View Details" data-toggle="tooltip"><span class="fa fa-eye" style=></span></a></td>
                        <td><a href="{{ Route('update', ['id'=>$one->id]) }}" class="btn btn-secondary" title="Update Details" data-toggle="tooltip"><span class="fa fa-pencil"></span></a></td>
                        <td><a href="javascript:void(0)" title="Change Status" id="{{ $one->id }}" class="delete_btn_ajax btn btn-danger" data-toggle="tooltip"><span class="fas fa-trash"></span></a><input type="hidden" class="delete_id_value" value='{{$one->id}}'></td>
                        <td>Change role to: <a href="javascript:void(0)" title="Change Status" id="{{ $one->id }}" class="student_btn_ajax btn btn-success ms-3 mt-2" data-toggle="tooltip">Student</a><input type="hidden" class="student_id_value" value='{{$one->id}}'>
                                            <a href="javascript:void(0)" title="Change Status" id="{{ $one->id }}" class="admission_btn_ajax btn btn-success ms-3 mt-2" data-toggle="tooltip">Admission</a><input type="hidden" class="admission_id_value" value='{{$one->id}}'>
                                            <a href="javascript:void(0)" title="Change Status" id="{{ $one->id }}" class="teacher_btn_ajax btn btn-success ms-3 mt-2" data-toggle="tooltip">Teacher</a><input type="hidden" class="teacher_id_value" value='{{$one->id}}'></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <script>
            $(document).ready(function(){
                $('.delete_btn_ajax').click(function(e){
                    e.preventDefault();
                    var deleteid = $(this).attr('id');
                    var url = "{{ route('delete', ':id') }}";
                    var table_row = $(this).closest('tr');
                    swal.fire({
                        title: 'Are you Sure?',
                        text: 'You want be able to revert back.',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#9A2124',
                        confirmButtonColor: '#34A853',
                        confirmButtonText: 'Yes, Delete it!'
                    }).then((result)=>{
                        if(result.isConfirmed){
                            $.ajax({
                                type: "GET",
                                url: url.replace(':id',deleteid),
                                data:{
                                    _token: '{{ csrf_token() }}',
                                    delete_id: deleteid,
                                    
                                },
                                success: function(response) {
                                    console.log("here");
                                    swal.fire(
                                        'Deleted!',
                                        'Your record has been deleted.',
                                        'success'
                                    ).then((result)=>{
                                        table_row.remove();
                                    });

                                } 
                            });
                        }
                    })
                    });
                });  
            $(document).ready(function(){
                $('.student_btn_ajax').click(function(e){
                    e.preventDefault();
                    var statusid = $(this).attr('id');
                    var url = "{{ route('change', ':id') }}";
                    var table_row = $(this).closest('tr');
                    swal.fire({
                        title: 'Are you Sure?',
                        text: 'You want to change role.',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#9A2124',
                        confirmButtonColor: '#34A853',
                        confirmButtonText: 'Yes, Change it!'
                    }).then((result)=>{
                        if(result.isConfirmed){
                            $.ajax({
                                type: "POST",
                                url: url.replace(':id', statusid),
                                data:{
                                    student_id: statusid,
                                    student_btn_set: 1,
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(response) {
                                    console.log("here");
                                    swal.fire(
                                        'Changed!',
                                        'Your status has been changed.',
                                        'success'
                                    ).then((result)=>{
                                        window.location.reload();
                                    });

                                } 
                            });
                        }
                    })
                    });
                });
                $(document).ready(function(){
                $('.admission_btn_ajax').click(function(e){
                    e.preventDefault();
                    var statusid = $(this).attr('id');
                    var url = "{{ route('change', ':id') }}";
                    var table_row = $(this).closest('tr');
                    swal.fire({
                        title: 'Are you Sure?',
                        text: 'You want to change role.',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#9A2124',
                        confirmButtonColor: '#34A853',
                        confirmButtonText: 'Yes, Change it!'
                    }).then((result)=>{
                        if(result.isConfirmed){
                            $.ajax({
                                type: "POST",
                                url: url.replace(':id', statusid),
                                data:{
                                    admission_id: statusid,
                                    admission_btn_set: 1,
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(response) {
                                    console.log("here");
                                    swal.fire(
                                        'Changed!',
                                        'Your status has been changed.',
                                        'success'
                                    ).then((result)=>{
                                        window.location.reload();
                                    });

                                } 
                            });
                        }
                    })
                    });
                });  
                
                $(document).ready(function(){
                $('.teacher_btn_ajax').click(function(e){
                    e.preventDefault();
                    var statusid = $(this).attr('id');
                    var url = "{{ route('change', ':id') }}";
                    var table_row = $(this).closest('tr');
                    swal.fire({
                        title: 'Are you Sure?',
                        text: 'You want to change role.',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#9A2124',
                        confirmButtonColor: '#34A853',
                        confirmButtonText: 'Yes, Change it!'
                    }).then((result)=>{
                        if(result.isConfirmed){
                            $.ajax({
                                type: "POST",
                                url: url.replace(':id', statusid),
                                data:{
                                    teacher_id: statusid,
                                    teacher_btn_set: 1,
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(response) {
                                    console.log("here");
                                    swal.fire(
                                        'Changed!',
                                        'Your status has been changed.',
                                        'success'
                                    ).then((result)=>{
                                        window.location.reload();
                                    });

                                } 
                            });
                        }
                    })
                    });
                });    

    </script>
    </body>

</html>
@include('layouts.navbar')



<!DOCTYPE html>
<html>
    <head>
        <title>Manage Student Marks</title>
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
            <h1 class="mt-3 text-center">Update Students Marks.</h1>
        </div>
        <br><br>
        <?php
        $crud = \DB::table('crud')->where('role', 'student')->get();
        $user = Session::get('user');
        $name = $user->name;
        ?>
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Class</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($crud as $one)
                    <?php
                    $class = $one->class;
                    if($class){
                        $row = \DB::table('classes')->where('class', $class)->first(); 
                        $p = $row->physics;
                        $c = $row->chemistry;
                        $m = $row->maths;
                        $s = $row->science;
                        $h = $row->hindi;
                        $e = $row->english;
                    }
                    ?>
                    @if($class && ($p==$name  or  $c==$name  or  $m==$name  or $s==$name  or  $h==$name  or $e==$name) )
                        <tr class="text-center">
                            <td>{{$one->id}}</td>
                            <td>{{$one->email}}</td>
                            <td>{{$one->role}}</td>
                            <td>{{$one->class}}</td>
                            <td><a href="{{ Route('updatestudentmarks', ['id'=>$one->id]) }}" class="btn btn-secondary" title="Update Details" data-toggle="tooltip">Update Marks</a></td>
                        </tr>
                    @endif
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

    </script>
    </body>

</html>
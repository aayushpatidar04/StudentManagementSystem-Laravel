@include('layouts.navbar')
<!DOCTYPE html>
<html>
    <head>
        <title>Update Record</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jqajax.js"></script>
        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
        <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

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
        <?php
        $teachers = \DB::table('crud')->where('role',  'teacher' )->get();
        ?>
        <div class="container">
            <h1 class="mt-5">Assign Class and Subject</h1>



            <form action="{{ Route('saveassign') }}" method="POST" enctype="multipart/form-data" id="createform">
            @csrf
                <div class="form-group">
                    <label for="class" class="mt-2">Class</label>
                    <input type="number" name="class" id="class" class="form-control mt-2">
                </div>
                <div class="form-group">
                    <label for="teacher" class="mt-2">Teacher</label>
                    <select type="text" name="teacher" id="teacher" class="form-control mt-2">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                    <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject" class="mt-2">Subject</label>
                    <select type="text" name="subject" id="subject" class="form-control mt-2">
                    <option value="">Select Subject</option>
                    <option value="physics">Physics</option>
                    <option value="chemistry">Chemistry</option>
                    <option value="maths">Maths</option>
                    <option value="science">Science</option>
                    <option value="hindi">Hindi</option>
                    <option value="english">English</option>
                    </select>
                </div>
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary" id="btnadd">Submit</button>
                    <a href="{{ Route('manage_user') }}" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script>

            $(document).ready(function() {
            $('#country').on('change', function() {
            var country_id = this.value;
            $("#state").html('');
            $.ajax({
                url: "{{ url('states_by_country') }}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{csrf_token()}}'
                },
                success: function(result){
                    $('#state').html('<option value=""> Select State </option>');
                    $.each(result, function (key,value) {
                            $("#state").append('<option value="' + value.s_id + '">' + value.state + '</option>');
                        });
                    $('#city').html('<option value="">Select State First</option>'); 
                }
            });
            });    
            $('#state').on('change', function() {
            var state_id = this.value;
            $.ajax({
                url: "{{ url('cities_by_state') }}",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{csrf_token()}}'
                },
                success: function(result){
                    $('#state').html('<option value=""> Select State </option>');
                    $.each(result, function (key,value) {
                            $("#city").append('<option value="' + value.c_id + '">' + value.city + '</option>');
                        });
            }
            });
            });
            });
        </script>

    </body>
</html>
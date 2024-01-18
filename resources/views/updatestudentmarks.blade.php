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
        <?php
            $student = \DB::table('crud')->where('id',$id)->first();
            $class = $student->class;
            $row = \DB::table('classes')->where('class', $class)->first();
            $user = Session::get('user');
            $name = $user->name;

        ?>
        <div class="container">
            <h1 class="mt-5">Update Marks</h1>

                <form action="{{ Route('savemarks') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <p>Please fill this form and submit to update student marks to the database.</p>
                        <input type="hidden" name="email" id="email" class="form-control mt-2" value="{{ $student->email }}">
                    </div>
                    <?php
                    if($row->physics==$name){
                    ?>
                    <div class="form-group">
                        <label for="physics" class="mt-2">Physics</label>
                        <input type="number" name="physics" id="physics" class="form-control mt-2"  required>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if($row->chemistry==$name){
                    ?>
                    <div class="form-group">
                        <label for="chemistry" class="mt-2">Chemistry</label>
                        <input type="number" name="chemistry" id="chemistry" class="form-control mt-2"  required>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if($row->maths==$name){
                    ?>
                    <div class="form-group">
                        <label for="math" class="mt-2">Math</label>
                        <input type="number" name="math" id="math" class="form-control mt-2"  required>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if($row->science==$name){
                    ?>
                    <div class="form-group">
                        <label for="science" class="mt-2">Science</label>
                        <input type="number" name="science" id="science" class="form-control mt-2"  required>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if($row->english==$name){
                    ?>
                    <div class="form-group">
                        <label for="english" class="mt-2">English</label>
                        <input type="number" name="english" id="english" class="form-control mt-2"  required>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if($row->hindi==$name){
                    ?>
                    <div class="form-group">
                        <label for="hindi" class="mt-2">Hindi</label>
                        <input type="number" name="hindi" id="hindi" class="form-control mt-2"  required>
                    </div>
                    <?php
                    }
                    ?>
                    
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary" id="btnadd">Submit</button>
                    <a href="{{ Route('manage_student_marks') }}" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        
    </body>
</html>
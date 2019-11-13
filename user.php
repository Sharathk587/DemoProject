<?php  session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <h4 class="navbar-brand text-white">Welcome to userpanel <?php echo $_SESSION['username'];?></h4>
        <div class="collapse navbar-collapse">
             <ul class="nav  ml-auto">
                <li>
                     <a href="logout.php">Logout </a>
                </li>
            </ul>
              
        </div>
    </nav>
    <br><br>
    <script> var count=0; </script>
    <section>
        <div class="row card">
           <div class="card-header">
               <h4> Work details</h4>
           </div>
           <form  method="post">
           <div class="card-body">
             <div class="row" id="new0">
                 <div class="col-md-2">
                     <input type="date" class="date form-control" name="date[]" id="date" >
                 </div>
                 <div class="col-md-2">
                     <input type="text" class="projectName form-control" name="projectName[]" id="projectName" placeholder="Project Name">
                 </div>
                 <div class="col-md-2">
                     <input type="text" class="bugs form-control" name="bugs[]" id="bugs" placeholder="Bugs">
                 </div>
                 <div class="col-md-2">
                     <input type="text" class="fixes form-control" name="fixes[]" id="fixes" placeholder="Bug fixes">
                 </div>
                 <div class="col-md-2">
                     <textarea class="form-control" name="comments[]" id="comments[]" cols="25" rows="2" placeholder="Comments"></textarea>
                 </div>
                 <div class="col-md-2">
                     <button type="button" class="btn btn-sm btn-success form-control add">Add new row</button>
                 </div>
                 
             </div>
           </div>
           <div id="new"></div>
           </form>  
            <div class="card-footer">
                <div class="col-md-2">
                    <input type="submit" class="btn btn-sm btn-outline-success submit" value="submit">
                </div>
            </div>

    </section>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom"> </nav>
 <script>
     $(document).ready(function(){
         $.counter = 1;
         $(document).on('click','.add',function(){
             
           $(document).find('#new').append('<div class="card-body row" id="new'+$.counter+'"><div class="col-md-2"><input type="date" class="date form-control" name="date[]" id="date" ></div><div class="col-md-2"><input type="text" class="projectName form-control" name="projectName[]" id="projectName" placeholder="Project Name"> </div><div class="col-md-2"> <input type="text" class="bugs form-control" name="bugs[]" id="bugs" placeholder="Bugs"></div> <div class="col-md-2"> <input type="text" class="fixes form-control" name="fixes[]" id="fixes" placeholder="Bug fixes"> </div> <div class="col-md-2"> <textarea name="comments[]" class="form-control" id="comments" cols="30" rows="2" placeholder="Comments"></textarea> </div> <div class="col-md-2">&nbsp;&nbsp;<button type="button" class="btn btn-sm btn-success form-control removeRow" data-id="'+$.counter+'">Remove row</button> </div></div>');
            $.counter++;
         });

         $(document).on('click','.removeRow',function(){
             var id = $(this).data('id');
             var remove ='#new'+id;
             console.log(remove);
             $(remove).remove();
         })

         $(document).on('click','.submit',function(){

            var value=$('form').serialize();
            
            
            $.ajax({
                url:'datainsert.php',
                method:'post',
                data:value,
                dataType:'json',
                success:function(response){
                     alert(response.message);
                     window.location.href='user.php';

                },
                error:function(){
                    console.log("error");
                }
            })



         })
         
     });
 
 
 </script>

</body>
</html>
 
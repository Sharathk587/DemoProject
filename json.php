<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body>
    <div class="row">
        <table class="table">
            <thead>
                <th>name</th>
            </thead>
            <tbody id="new">
               
            </tbody>

        </table></table>
        

    </div>
    <script>
        $(document).ready(function(){
           var value;
            $.ajax({
                 url:'http://dummy.restapiexample.com/api/v1/employees',
                 method:'get',
                 dataType:'json',
                 success:function(data)
                        {
                            // console.log(data['id']);
                            for(var i=0;i<data.length;i++){
                                value +="<tr><td>"+data[i]['employee_name']+"</td>"+"<td>"+data[i]['id']+"</td></tr>";
                            }
                               
                            $('#new').html(value);
                        },
                error:function()
                     {
                        console.log("error");
                     }
            });
          
        });
        

    </script>
</body>
</html>
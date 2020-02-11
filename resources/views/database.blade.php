
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
      <div class="col-md-6">
                  <h3>Form</h3>
                  
                  <select name="sel_db" class="form-control"  id="sel_db">
                      <option value="" onclick ="beforeSend()" > Select DB </option>
                        @foreach($database as $database)
                          <option value="{{ $database }} "> {{ $database }} </option>
                        @endforeach
                  </select></br>
                <!-- <button type="submit">Get Table</button> -->
                

                    <h2>Show Table form database1</h2>
                  
                    <form>

                 
                      <div class="checkbox" id='sel_emp'>
                        <!-- <label><input type="checkbox" value="">Table 2</label> -->
                      </div>
                      
                    </form>
      </div>
         <div class="col-md-6">
                  <h3>To</h3>


                  <select name="role" class="form-control" >
                  <option value=""> Select DB </option>
                          <option value=""> </option>

                  </select>
                    <h2>Show Table form database2</h2>
                  
                    <form>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Table 1</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" value="">Table 2</label>
                      </div>
                      <div class="checkbox ">
                        <label><input type="checkbox" value="" >Table 3</label>
                      </div>
                    </form>

         </div>
         <div class="row">
         <div class ="col-md-12">
         <button style="color:green;text-align:center;" type ="button"> Move table </button>
         </div>
         </div>
 </div>        
 <script type='text/javascript'>

$(document).ready(function(){

  
  $('#sel_db').change(function(){
 
    var database = $(this).val();
    var currentRequest = null;  
    
     // AJAX request 
          $.ajax({
                 type: 'get',
                // type: 'post',
                url : "{{url('/table')}}",
                
                data : {
                  
                  database:database 
                  // _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                 beforeSend : function()    {           
                    if(currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function(response){
                  var len = 0;
                  if(response != null){
                    len = response.length;
                  }
                  
                  var table = response;
                  
                  if(len > 0){
        
                    for(var i=0; i<len; i++){

                 
                      
                    //  var option = "<label><input type="checkbox" value="">"+table[i]+"</label>";
                         var option = "<option  value=''>"+table[i]+"</option>"; 

                      $("#sel_emp").append(option); 
                    }
                  }

                  }
          });

      });
});

</script>

</body>
</html>
<html lang="en">
<head>
  <title>Laravel 6 Multiple File Upload Example</title>
  <script src="jquery/jquery.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>


<div class="container lst">


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif


@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div> 
@endif
  
<h3 class="well">Laravel 6 Multiple File Upload</h3>
<form method="post" action="{{url('postImages')}}" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="input-group hdtuto control-group lst increment" >
      <input type="file" name="filenames[]" class="myfrm form-control">
      <div class="input-group-btn">
        <button class="btn btn-success" id="addBtn" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
      </div>
    </div>
    <div class="clone hide">
      <div class="hdtuto control-group lst input-group" id="hiding" style="margin-top:10px">
        <input type="file" name="filenames[]" class="myfrm form-control">
        <div class="input-group-btn"> 
          <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>Remove</button>
        </div>
      </div>
    </div>


    <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>


</form>        
</div>


<script type="text/javascript">
    $(document).ready(function() {
      
     var m = $("#addBtn").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents("#hiding").remove();
      });
    });
</script>
</body>
</html>
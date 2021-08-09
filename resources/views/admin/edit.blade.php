
  @extends('admin.inc.mainNav')
  @section('title','MKR Admin')
  @section('content')

      <div class="main-content">
        <section class="section">

          <div class="row">
              <div class="col-12">
                @include('message')
              </div>
              <div class="col-12">
                  <a href="/back" class="btn btn-success btn-sm btn-flat">Back</a>
              </div>
          <div class="col-12 col-md-2 col-lg-2"></div>
          <div class="col-12 col-md-8 col-lg-8">
              
            <div class="card">
                <form class="needs-validation" action="/postEditProject/{{$data->id}}" method="POST" enctype="multipart/form-data" novalidate="">
                {{csrf_field()}}
                    <div class="card-header bg-primary">
                        <h4 class="text-white">New Project</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Project Client</label>
                                    <input type="text" name="client" value="{{$data->client}}" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Fill out Project Name
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" name="position"value="{{$data->position}}" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Fill out position
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Current Stage</label>
                                    <input type="text" name="currentStage" value="{{$data->currentStage}}" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Current Stage is required
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="location" value="{{$data->location}}" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Fill out location
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea name="description" required class="form-control" cols="30" rows="10">{{$data->description}}</textarea>
                                    <div class="invalid-feedback">
                                       Fill out location
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label>Images</label>
                                    <div class="input-group" id="increments">
                                        <input type="file" class="form-control" name="imageName[]">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span id="addForm" class="btn btn-default btn-flat">Add</span>
                                            </div>
                                        </div>
                                    </div>&nbsp;
                                    
                                    <div id="hiding">
                                        <div id="copies">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="imageName[]">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <button id="removeForm" class="btn btn-default btn-flat">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="invalid-feedback">
                                        Image is required
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            </div>
          </div>
          <div class="col-12 col-md-2 col-lg-2"></div>

    <script src="jquery/jquery.js"></script>
    <script>
        $(function(){
            $("#home").addClass("active");
            $("#home1").addClass("active");

            $("#addnew").on('click',function(){
                //alert("Rwanda");
                window.location = '/newPro';
            });
        });
    </script>

    
<script type="text/javascript">
    $(document).ready(function() {

     var m = $("#addForm").click(function(){
          var lsthmtl = $("#copies").html();
          //alert(lsthmtl)
          $("#increments").after(lsthmtl);
      });
      $("body").on("click","#removeForm",function(){ 
          $(this).parents("#hiding").remove();
      });
    });
</script>
  @endsection

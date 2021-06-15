
  @extends('admin.inc.mainNav')
  @section('title','Rwanda Kigali')
  @section('content')

      <div class="main-content">
        <section class="section">
          
          <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary"  style="width:100%;">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <h4 class="text-white">All projects</h4>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7"></div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <button id="addnew" class="btn btn-success btn-flat btn-sm">New Project</button>
                    </div>
                </div>
                <div class="card-body">
                  @include('message')
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                    <thead>
                        <tr>
                        <th>Client</th>
                        <th>Position</th>
                        <th>Current Stage</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Remove</th>
                        <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if(count($data)>0)
                        @foreach($data as $project)
                          <tr>
                            <td>{{$project->client}}</td>
                            <td>{{$project->position}}</td>
                            <td>{{$project->currentStage}}</td>
                            <td>{{$project->location}}</td>
                            <td>{{$project->description}}</td>
                            <td><button onclick="removeProject({{$project->id}})" class="btn btn-flat btn-danger btn-sm"><span class="fas fa-minus"></span></button></td>
                            <td><a href="/editProject.{{$project->id}}" class="btn btn-flat btn-warning btn-sm"><span class="fas fa-edit"></span></a></td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
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
    <script>
      function removeProject(id){
        var values = confirm("Do you really want to delete project??");
        if (values) {
          window.top.location="/removeProject/"+id;
        }
      }
    </script>
  @endsection

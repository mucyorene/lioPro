@if(!session('loggedUser'))
    No identification
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="alert alert-success">
        You're welcome bwana {{$loggedUser['names']}}
        <a href="{{ route('endSession')}}" class="btn btn-info">Logout</a>
    </div>
</body>
</html>
@endif

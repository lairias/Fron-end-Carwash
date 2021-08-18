@extends('adminlte::page')
@section('content')


<div class="card card-primary">
    <div class="card-header">
        @foreach($Count as $count)
        <h4 class="card-title text-uppercase">{{$count['name']}}</h4>
        @endforeach
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach($Count as $count)
    <form action={{route('rol.update', $count['id']) }} method="post" id='formularioPersona' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for=""></label>
            <input type="text" name="nombre" id="{{$count['id']}}" class="form-control" placeholder="{{$count['name']}}" aria-describedby="helpId" value="{{$count['name']}}">
        </div>
        @endforeach
        <hr>
        <!-- /.card-body -->
        <div class="card-body">
            <div class="row">

                @foreach($AllRoles as $role)
                <div class="form-check col-3">
                    <input type="checkbox" class="form-check-input" id={{"permiso_".$role['id']}} value="{{$role['id']}}" name="permiso[]" PermisoID @foreach($Roles as $rol) @if($rol['PermisoID']===$role['id'] ) checked @else @endif @endforeach>




                    <label class="form-check-label" for={{"permiso_".$role['id']}}>
                        <span class="badge
                        bg-success
                        ">{{$role['name']}}</span> </label>
                </div>

                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</div>


</form>

</div>
</div>
@endsection
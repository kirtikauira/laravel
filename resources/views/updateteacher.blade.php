@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Teacher</h2>
            </div>
            <div class="pull-right">
                
            </div>
        </div>
    </div>
    
    
    <div class="pull-left">
                <h2>Edit Teacher Records</h2>
            </div>

    {!! Form::open(array('route' => 'teacher.update','method'=>'POST','files'=>true)) !!}
    @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', {{$teacher->name, array('placeholder' => 'Name','class' => 'form-control' )) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::email('email', {{$teacher->email}}, array('placeholder' => 'Email','class' => 'form-control', )) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Upload File:</strong>
                {!! Form::file('image', array('class' => 'form-control')) !!}
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
    {!! Form::close() !!}

   
@endsection
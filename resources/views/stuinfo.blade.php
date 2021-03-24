@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Student</h2>
            </div>
            <div class="pull-right">
                
            </div>
        </div>
    </div>
    
    <div class="pull-left">
                <h2>Create Teacher Records</h2>
            </div>

    {!! Form::open(array('route' => 'teacher.store','method'=>'POST','files'=>true)) !!}
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
            <div class="form-group">
               {!! Form::Label('Teachers', 'Item:') !!}
               <select class="form-control" name="item_id" id='teach_item'>
                @foreach($teachers as $item)
                <option value="{{$item->item_id}}">{{$item->name}}</option>
                 @endforeach
                </select>
        </div>
            </div>
            </div>
            </div>
               
    {!! Form::close() !!}
 <!-- Department Employees Dropdown -->
 Student : <select id='sel_stu' name='sel_emp'>
       <option value='0'>-- Select Student --</option>
    </select>
   
@endsection

<!-- Script -->
<script type='text/javascript'>

jQuery(document).ready(function(){

  
  $('#teach_item').change(function(){

     var id = $(this).val();

 // AJAX request 
     $.ajax({
       url: 'stuinfo/'+id,
       type: 'get',
       dataType: 'json',
       success: function(response){

         var len = 0;
         if(response['data'] != null){
           len = response['data'].length;
         }

         if(len > 0){
           
           for(var i=0; i<len; i++){

             var id = response['data'][i].id;
             var name = response['data'][i].name;

             var option = "<option value='"+id+"'>"+name+"</option>"; 

             $("#sel_stu").append(option); 
           }
         }

       }
    });
  });

});

</script>

@if(isset($role))
{!! Form::model($role,
    [
        'route'=>['admin.updateRole','id'=>$role->id],
        'method'=>'POST',
        ]
) !!}
@else
{!! Form::model(
    [
        'route'=>'admin.storeRole',
        'method'=>'POST',
        ]
) !!}

@endif

<div class="mb-3">
        {!! Form::label('','Role',['class'=>'form-label']) !!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
</div>
@error('name') {{$message}}  @enderror
@if(isset($role))
{!! Form::submit('Update role',['class'=>'btn btn-primary'])!!}
@else
{!! Form::submit('Add role',['class'=>'btn btn-primary'])!!}
@endif
{!! Form::close() !!}
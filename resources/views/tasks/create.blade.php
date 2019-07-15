@extends('layouts.app')

@section('title', 'task')

@section('content')
<div class="col-8 mx-auto mt-2">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</Li>
            @endforeach
        </ul>
        </div>
    @endif
    <form action="{{ url('/tasks/store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <label for="type_id">Type :</label>
            <select class="form-control" name="type_id">
        <!-- <select name="type"> -->
        <option value="" hidden></option>
        @foreach($types as $type)
            @if( old('type_id') == $type['id'])
            <option value="{{ $type['id'] }}" selected>{{ $type['name'] }}</option>
            @else
            <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
            @endif
        @endforeach
        </select>
    <label for="name">Name : </label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
    <label for="detail">Detail : </label>
        <textarea type="text" class="form-control" rows="5" name="detail" value="" >{{ old('detail') }}</textarea>
    <label class="text-inline">Status :</label>
        <label class="radio-inline">
        @foreach($statuses as $status)
            @if( old('status',-1) == $status['id'])
                <input type="radio" name="status"  value="{{ $status['id']}}" checked >{{ $status['name']}}</label>
            @else
                <input type="radio" name="status"  value="{{ $status['id']}}" >{{ $status['name']}}</label>
            @endif
        @endforeach
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
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
            <li>{{ $error }}</Li
            @endforeach
        </ul>
        </div>
    @endif
    <form action="{{ url('/tasks/store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <label for="type_id">Type :</label>
            <select class="form-control" name="type_id">
        <!-- <select name="type"> -->
        @foreach($types as $type)
        <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
        @endforeach
        </select>
    <label for="name">Name : </label>
        <input type="text" class="form-control" name="name" value="" />
    <label for="detail">Detail : </label>
        <textarea type="text" class="form-control" rows="5" name="detail" value="" ></textarea>
    <label class="text-inline">Status :</label>
        <label class="radio-inline">
        @foreach($statuses as $status)
            <input type="radio" name="status"  value="{{ $status['id']}}" >{{ $status['name']}}
            </label>&nbsp;
        @endforeach
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
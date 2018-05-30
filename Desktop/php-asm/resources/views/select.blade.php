@extends('layout')
@section('title', 'List attendance slots')

@section('content')
    <div class="clearfix"></div>
    <div class="alert alert-success d-none" role="alert" id="messageSuccess"></div>
    <div class="alert alert-danger d-none" role="alert" id="messageError"></div>

    <div class="panel-heading text-center">
        <h3 class="panel-title">Today activity</h3>
    </div>

    <table class="table table-hover" id="dev-table">
        <thead>
        <tr>
            <th>Slot Id</th>
            <th>Timeslot</th>
            <th>Subject</th>
            <th>Class Id</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendance_slots as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->slotCode}}</td>
            <td>{{$item->subject}}</td>
            <td>{{$item->classCode}}</td>
            <td><a href="/students/{{$item->id}}/edit" class="btn btn-link">Take attendance</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
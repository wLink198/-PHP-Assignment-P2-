@extends('layout')
@section('title', 'Take attendance')

@section('content')
    <div class="clearfix"></div>
    <div class="alert alert-success d-none" role="alert" id="messageSuccess"></div>
    <div class="alert alert-danger d-none" role="alert" id="messageError"></div>

    <div class="panel-heading text-center">
        <h3 class="panel-title">Take attendance</h3>
    </div>

    <table class="table table-hover" id="dev-table">
        <thead>
        <tr>
            <th>Rollnumber</th>
            <th>Name</th>
            <th>Present</th>
        </tr>
        </thead>
        <tbody>
        @foreach($student_detail as $item)
            <tr>
                <td id="rollNumber">{{$item->code}}</td>
                <td>{{$item->name}}</td>
                <td><input type="checkbox"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form type="submit" action="/students/store">
        <div class="float-lg-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
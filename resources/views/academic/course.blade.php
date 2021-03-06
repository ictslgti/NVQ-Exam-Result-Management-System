@extends('layouts.master')
@section('title')
Add a Course
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header bg-white">
        <div class="align-items-center row">
            <div class="col">
                <h5 class="mb-0 font-weight-bolder">Add a Course</h5>
            </div>
            <div class="text-right col-auto">
                <a type="button" class="btn btn-sm btn-outline-primary shadow-sm" href="{{route('courses')}}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('courses.create')}}">
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                        <label for="code">Course Code</label>
                        <input id="code" class="form-control" type="text" name="code" maxlength="20">
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">Course Name</label>
                            <input id="name" class="form-control" type="text" name="name">
                        </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="department_id">Department </label>
                        <select id="department_id" class="custom-select" name="department_id">
                            <option value="null" disabled selected>--Select Department--</option>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach     
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="nvq_id">NVQ Level</label>
                        <select id="nvq_id" class="custom-select" name="nvq_id">
                            <option value="null" disabled selected>--Select NVQ Level--</option>
                            @foreach ($nvqs as $nvq)
                                <option value="{{$nvq->id}}">{{$nvq->name}}</option>
                            @endforeach      
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="duration">Duration (Months) </label>
                        <input id="duration" class="form-control" type="number" name="duration">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="ojt_duration">OJT Duration (Months)</label>
                        <input id="ojt_duration" class="form-control" type="number" name="ojt_duration">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary float-right" >Save</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
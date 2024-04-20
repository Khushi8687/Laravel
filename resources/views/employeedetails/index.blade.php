@extends('layouts/admin')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">View all Employee Details</h1> 
        </div>
    </div>
    <div class="row">
        @foreach($employeedetails as $employeedetail) 
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $employeedetail->fname }} {{ $employeedetail->lname }}</h5> 
                        <a href="{{ route('employeedetails.edit', $employeedetail->id) }}" class="card-link">Edit</a> 
                        <a href="{{ route('employeedetails.delete', $employeedetail->id) }}" class="card-link">Delete</a> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

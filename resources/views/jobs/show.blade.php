@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
                    <p>
                        <h4>Description</h4>
                        {{$job->description}}
                    </p>
                    <p>
                        <h4>Duties</h4>
                        {{$job->roles}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Brief Info</div>

                <div class="card-body">
                    <p>Company: <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                            {{$job->company->cname}}
                                </a>
                    </p>
                    <p>Address: {{$job->address}}</p>
                    <p>Job Position: {{$job->position}}</p>
                    <p>Post on: {{$job->last_date}}</p>
                </div>
            </div>
            @if(Auth::check())
                <button style="width:100%;" class="btn btn-success">Apply</button>
            @endif
        </div>
   </div>
</div>
@endsection

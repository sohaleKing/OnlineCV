@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <h3>Recent Jobs</h3>
    <table class="table">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>
                        <img src="{{asset('img/JobsPortal.png')}}" width="60">
                    </td>
                    <td>
                        Position : {{$job->position}}
                            <br>
                            {{$job->type}}
                    </td>
                    <td>
                        address : {{$job->address}}
                    </td>
                    <td>
                        date : {{$job->created_at->diffForHumans()}}
                    </td>
                    <td>
                        <a href="{{route('jobs.show', [$job->id,$job->slug])}}">
                            <button class="btn btn-primary btn-sm">Details</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>



    </div>
</div>
@endsection

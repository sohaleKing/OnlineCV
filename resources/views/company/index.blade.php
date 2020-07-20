@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="company-profile col-12">
                <img src="{{asset('cover/banner.png')}}" width="100%">
           </div> 
           <div class="company-desc col-12"><hr>
                <img src="{{asset('avatar/companyLogo.png')}}" width="100">
                <h3>{{$company->cname}}</h3>
                <p>{{$company->description}}</p>
                <p>
                <p><b>Slogan:</b>&nbsp;{{$company->slogan}}</p>
                <p><b>address:</b>&nbsp;{{$company->address}}</p>
                <p><b>phone:</b>&nbsp;{{$company->phone}}</p>
                <p><b>website:</b>&nbsp;{{$company->website}}</p>  
           </div> 
           <table class="table">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach($company->jobs as $job)
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


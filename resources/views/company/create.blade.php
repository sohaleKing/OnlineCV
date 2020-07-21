@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img src="{{asset('img/companyLOGO.png')}}"  style="border-redius:50px; width:100%;">
                
                @else
                    <img src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}"
                      style="border-redius:50px; width:100%;">
                @endif
                
                <form action="{{route('company.logo')}}" method="get" enctype="multipart/form-data">
                @csrf <br>
                <div class="card">
                    <div class="card-header">Company Logo</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="logo"><br>
                         <!-- Error Exception -->
                         @if($errors->has('logo'))
                            <div class="error text-danger">
                                <small> {{$errors->first('logo')}}</small>
                            </div>
                        @endif 
                        <button  class="btn btn-secondary">Change</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Company Information</div>
                    <div class="card-body">
                    <form action="{{route('company.store')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address"></textarea>
                         <!-- Error Exception -->
                         @if($errors->has('address'))
                            <div class="error text-danger">
                                <small>* {{$errors->first('address')}}</small>
                            </div>
                        @endif 
                        </div>
                       
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" name="phone" class="form-control">
                        <!-- Error Exception -->
                         @if($errors->has('phone'))
                            <div class="error text-danger">
                                <small>* {{$errors->first('phone')}}</small><br>
                                <!-- <small class="text-secondary">must be 10 digit numbers starts only with 514</small> -->
                            </div>
                        @endif 
                        </div>  

                        <div class="form-group">
                            <label>WebSite</label>
                            <input type="text" name="website" class="form-control">
                        <!-- Error Exception -->
                         @if($errors->has('website'))
                            <div class="error text-danger">
                                <small>* {{$errors->first('website')}}</small><br>
                                <!-- <small class="text-secondary">must be 10 digit numbers starts only with 514</small> -->
                            </div>
                        @endif 
                        </div> 

                        <div class="form-group">
                            <label>Slogan</label>
                            <input type="text" name="slogan" class="form-control">
                        <!-- Error Exception -->
                         @if($errors->has('slogan'))
                            <div class="error text-danger">
                                <small>* {{$errors->first('slogan')}}</small><br>
                                <!-- <small class="text-secondary">must be 10 digit numbers starts only with 514</small> -->
                            </div>
                        @endif 
                        </div> 

                        
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="description">
                            </textarea>
                        <!-- Error Exception -->
                         @if($errors->has('description'))
                            <div class="error text-danger">
                                <small> * {{$errors->first('description')}}</small>
                            </div>
                        @endif 
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update</button>
                        </div>
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Company Info</div>
                    <div class="card-body">
                       
                       <p><b>Company Name:</b> {{Auth::user()->company->cname}}</p>
                       <p><b>Address:</b> {{Auth::user()->company->address}}</p>
                       <p><b>Phone Number:</b> {{Auth::user()->company->phone}}</p>
                       <p><b>Website</b> {{Auth::user()->company->website}}</p>
                       <p><b>Slogan</b> {{Auth::user()->company->slogan}}</p>
                       <p><b>Description</b> {{Auth::user()->company->description}}</p>
                       <p><b>Joined since:</b> {{Auth::user()->created_at->diffForHumans()}}</p>

                    </div>
                </div>
                <form action="{{route('company.coverPhoto')}}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Cover Photo</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_photo"><br>
                         <!-- Error Exception -->
                         @if($errors->has('cover_photo'))
                            <div class="error text-danger">
                                <small> {{$errors->first('cover_photo')}}</small>
                            </div>
                        @endif 
                        <button  class="btn btn-secondary">Upload</button>
                    </div>
                </div>
                </form>
                 
                </div>
            </div>
         </div>
     </div>
    @endsection
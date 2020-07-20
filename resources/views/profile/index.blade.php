@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->profile->avatar))
                    <img src="{{asset('img/profile.png')}}"  style="border-redius:50px; width:100%;">
                
                @else
                    <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}"
                      style="border-redius:50px; width:100%;">
                @endif
                
                <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data">
                @csrf <br>
                <div class="card">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="avatar"><br>
                         <!-- Error Exception -->
                         @if($errors->has('avatar'))
                            <div class="error text-danger">
                                <small> {{$errors->first('avatar')}}</small>
                            </div>
                        @endif 
                        <button  class="btn btn-secondary">Change</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update your Information</div>
                    <div class="card-body">
                    <form action="{{route('profile.store')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address"
                            placeholder="{{Auth::user()->profile->address}}"></textarea>
                         <!-- Error Exception -->
                         @if($errors->has('address'))
                            <div class="error text-danger">
                                <small>* {{$errors->first('address')}}</small>
                            </div>
                        @endif 
                        </div>
                       
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" name="phone_number" class="form-control"
                            placeholder="{{Auth::user()->profile->phone_number}}">
                        <!-- Error Exception -->
                         @if($errors->has('phone_number'))
                            <div class="error text-danger">
                                <small>* {{$errors->first('phone_number')}}</small><br>
                                <!-- <small class="text-secondary">must be 10 digit numbers starts only with 514</small> -->
                            </div>
                        @endif 
                        </div> 
                                             
                        <div class="form-group">
                            <label>Experience</label>
                            <textarea class="form-control" rows="3" name="experience"
                            placeholder="{{Auth::user()->profile->experience}}"></textarea>
                        <!-- Error Exception -->
                         @if($errors->has('experience'))
                            <div class="error text-danger">
                                <small> * {{$errors->first('experience')}}</small>
                            </div>
                        @endif 
                        </div>
                        <div class="form-group">
                            <label>Biography</label>
                            <textarea class="form-control" rows="3" name="bio"
                            placeholder="{{Auth::user()->profile->bio}}"></textarea>
                        <!-- Error Exception -->
                         @if($errors->has('bio'))
                            <div class="error text-danger">
                                <small>* {{$errors->first('bio')}}</small>
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
                    <div class="card-header">User Info</div>
                    <div class="card-body">
                       <p><b>Name:</b> {{Auth::user()->name}}</p>
                       <p><b>Email:</b> {{Auth::user()->email}}</p>
                       <p><b>Address:</b> {{Auth::user()->profile->address}}</p>
                       <p><b>Phone Number:</b> {{Auth::user()->profile->phone_number}}</p>
                       <p><b>Experience:</b> {{Auth::user()->profile->experience}}</p>
                       <p><b>Biography:</b> {{Auth::user()->profile->bio}}</p>
                       <p><b>member since:</b> {{Auth::user()->created_at->diffForHumans()}}</p>
                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                                download the coverLetter</a>
                            </p>

                        @else
                            <p><small class="text-secondary">please upload your coverLetter</small></p>
                        @endif

                         @if(!empty(Auth::user()->profile->resume))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->resume)}}">
                                download the Resume</a>
                            </p>

                        @else
                            <p><small class="text-secondary">please upload your Resume</small></p>
                        @endif
                    </div>
                </div>
                <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Cover Letter</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_letter"><br>
                         <!-- Error Exception -->
                         @if($errors->has('cover_letter'))
                            <div class="error text-danger">
                                <small> {{$errors->first('cover_letter')}}</small>
                            </div>
                        @endif 
                        <button  class="btn btn-secondary">Upload</button>
                    </div>
                </div>
                </form>
                 <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">resume (CV)</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="resume"><br>
                          <!-- Error Exception -->
                         @if($errors->has('resume'))
                            <div class="error text-danger">
                                <small> {{$errors->first('resume')}}</small>
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


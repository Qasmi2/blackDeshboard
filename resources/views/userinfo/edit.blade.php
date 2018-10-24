@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Updat Form</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('flash-message')
                  

                    <form method="POST"  action="{{ url('updating/'.$info['id'])}}" >

                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="name" >{{ __('Name') }}</label>
                                <input id="name" type="name" placeholder="Enter Your Name " class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{  $info['name'] }}" required>
                               
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                    <label for="identity">{{ __('CNIC NUMBER') }}</label>
                                    <input id="identity" type="tel" size="15" maxlength="15" placeholder="CNIC NO ( 6110112345678 )" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity" value="{{  $info['identity'] }}"  pattern="[0-9]{13}" title=" Please match the CNIC No" required>
                                
                                    @if ($errors->has('identity'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('identity') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="ptclNo">{{ __('PTCL NUMBER') }}</label>
                                <input id="ptclNo" type="text" placeholder="Enter PTCL Number ( 051331234567 ) " class="form-control{{ $errors->has('ptclNo') ? ' is-invalid' : '' }}" name="ptclNo" value="{{  $info['ptclNO'] }}"  required>
                              
                                @if ($errors->has('ptclNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ptclNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="mobileNo">{{ __('MOBILE NUMBER') }}</label>
                                <input id="mobileNo" type="text" placeholder="Enter Mobile No ( 03331234567 )" class="form-control{{ $errors->has('mobileNo') ? ' is-invalid' : '' }}" name="mobileNo" value="{{ $info['mobileNo'] }}" >
                                @if ($errors->has('mobileNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobileNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
                       
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-primary " style="float:right;" >
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
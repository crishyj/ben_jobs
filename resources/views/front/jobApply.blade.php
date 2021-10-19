@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h3>
                        {{ config('app.name', 'Laravel') }}
                    </h3>
                </a>
                <hr>
                <div class="text-right">
                    <h1>Registeration</h1>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('storeProposal') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>
                        Contact Details                        
                    </h3>
                    <input type="hidden" name="job_id" value="{{$id}}">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">                       
                                <input type="text" name="fname" id="fname" class="form-control @error('fname') is-invalid @enderror" placeholder="First Name"  value="{{ old('fname') }}" autocomplete="fname" autofocus>
                            </div>

                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">                       
                                <input type="text" name="lname" id="lname" class="form-control @error('lname') is-invalid @enderror" placeholder="Last Name"  value="{{ old('lname') }}" autocomplete="lname" autofocus>
                            </div>
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="house" id="house" class="form-control @error('house') is-invalid @enderror" placeholder="House No."  value="{{ old('house') }}" autocomplete="house" autofocus>
                            </div>
                            @error('house')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" placeholder="Street Name"  value="{{ old('street') }}" autocomplete="street" autofocus>
                            </div>
                            @error('street')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="City/Town"  value="{{ old('city') }}" autocomplete="city" autofocus>
                            </div>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror" placeholder="Postal Code"  value="{{ old('postcode') }}" autocomplete="postcode" autofocus>
                            </div>
                            @error('postcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  value="{{ old('email') }}" autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Telephone"  value="{{ old('phone') }}" autocomplete="phone" autofocus>
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" name="birth" id="birth" class="form-control @error('birth') is-invalid @enderror" placeholder="Date of Birth"  value="{{ old('birth') }}" autocomplete="birth" autofocus>
                            </div>
                            @error('birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="ninumber" id="ninumber" class="form-control @error('ninumber') is-invalid @enderror" placeholder="N. I. Number"  value="{{ old('ninumber') }}" autocomplete="ninumber" autofocus>
                            </div>
                            @error('ninumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <h3>
                                Documents
                            </h3>
                            <p>
                                To prove your right to work on the U.K. Pleas upload one document from list A and one document from list B. Documents must be clear, with all corners in the image.
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h3>
                                List A.
                            </h3>
                            <div class="list_text">
                                Passport
                            </div>
                            <div class="list_text">
                                Driving Licence (Both Sides) Full U.K. 
                            </div>

                            <div class="list_text">
                                Birth Certificate Nartional Identity Card
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h3>
                                List B.
                            </h3>
                            <div class="list_text">
                                Bank Statement (within last 3 months)
                            </div>
                            <div class="list_text">
                                Utility Bill(within last 3 months)
                            </div>
                            <div class="list_text">
                                Government issues letter
                            </div>
                            <div class="list_text">
                                Payslip or P45
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="file" name="file1" id="file1" class="form-control  @error('file1') is-invalid @enderror" value="{{ old('file1') }}"  autocomplete="file1" autofocus accept="image/png, image/jpg, image/jpeg, application/pdf" placeholder="png, jpg, pdf">
                            @error('file1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>    

                        <div class="col-md-6 mt-2">
                            <input type="file" name="file2" id="file2" class="form-control  @error('file2') is-invalid @enderror" value="{{ old('file2') }}"  autocomplete="file2" autofocus accept="image/png, image/jpg, image/jpeg, application/pdf" placeholder="png, jpg, pdf">
                            @error('file2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>    

                        <div class="col-md-6 mt-5">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                                            
                        
                    </div>
                   
                </form>
            </div>
        </div>
        
    </div>
@endsection

@push('css')
    <style>
        .btn-success{
            background-color: #188A57 !important;
        }

        .card-body{
            background-color: #DEEDE6 !important;
        }
    </style>
@endpush
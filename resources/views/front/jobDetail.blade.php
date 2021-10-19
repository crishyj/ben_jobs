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
                <div class="job_title">
                    {{ $title }}
                </div>
            </div>
            <div class="card-body">
                <div class="job_title">
                    {{ $title }}
                </div>

                <div class="job_subtitle">
                    {{ $subtitle }}
                </div>

                <div class="job_price">
                     &#163; {{ $price }} P/H
                </div>
     
                <div class="job_timeline">
                     {{ $timeline }}
                </div>
     
                <div class="job_description">
                    {{ $description }}
                </div>
                <a href="{{ route('jobApply', $id)}}">
                     <div class="btn btn-success">
                         Apply
                     </div>
                 </a>
            </div>
        </div>        
       
    </div>
@endsection

@push('css')
    <style>
        svg{
            width: 20px;
        }

        .job_area nav{
            text-align: center;
        }
      

        .btn-success{
            background-color: #188A57 !important;
        }

        .card-body{
            background-color: #DEEDE6 !important;
        }

    </style>
@endpush
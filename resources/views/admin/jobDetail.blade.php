@extends('layouts.backend', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <div class="job_title">
                            {{ $title }}
                        </div>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>
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

        .job_title{
            font-size: 22px;
            font-weight: 700;
        }

        .job_subtitle{
            font-size: 18px;
        }

        .job_price{
            padding-top: 5px;
            font-weight: 700;
            font-size: 13px;
        }

        .job_timeline{
            font-weight: 700;
            padding-bottom: 5px;
            font-size: 13px;
        }

        .btn-success{
            background-color: #188A57 !important;
        }

    </style>
@endpush
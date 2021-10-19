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
                    <h2>Latest Jobs</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="job_area">
                    @if(isset($jobs))
                        
                        <table class="table table-striped">               
                            
                            <tbody>
                                @foreach($jobs as $dummy)
                                <tr>
                                    <td>
                                        <div class="job_title">
                                            {{ $dummy->title }}
                                        </div>
                                        <div class="job_subtitle">
                                            {{ $dummy->subtitle }}
                                        </div>
        
                                        <div class="job_price">
                                            &#163; {{ $dummy->price }} P/H
                                        </div>
        
                                        <div class="job_timeline">
                                            {{ $dummy->timeline }}
                                        </div>
        
                                        <div class="job_description">
                                            {{ $dummy->description }}
                                        </div>
                                        
                                        <div>
                                            <a href="{{route('jobDetail', $dummy->id)}}">Show More</a>
                                        </div>
        
                                    </td>
                                </tr>
                                @endforeach
                
                            </tbody>
                        </table>
                        {!! $jobs->render() !!}
                    @endif
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

        

        .card-header{
            background-color: #188A57 !important;
        }

        hr{
            border-top: 1px solid rgb(255 255 255) !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #DEEDE6 !important;
        }

    </style>
@endpush
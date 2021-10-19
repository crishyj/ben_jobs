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
                        {{ __('Proposals') }}
                    </div>

                    <div class="card-body">                        
                        
                        @if(isset($proposals))
                        
                            <table class="table table-striped">               
                                
                                <tbody>
                                    @foreach($proposals as $dummy)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="title2">Project Title:</span>
                                                    @foreach ($jobs as $item)
                                                        @if ($item->id == $dummy->job_id)
                                                            <a href="{{route('adminjobDetail', $item->id)}}">
                                                                {{ $item->title }}
                                                            </a>
                                                        @endif                                            
                                                    @endforeach 
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="title2">First name:</span>  {{ $dummy->fname }}
                                                </div>

                                                <div class="col-md-6">
                                                    <span class="title2">Sur name:</span>  {{ $dummy->lname }}
                                                </div>

                                                <div class="col-md-6">
                                                    <span class="title2">House No: </span>  {{ $dummy->house }}
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <span class="title2">Street Name:</span>  {{ $dummy->street }}
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <span class="title2">City/Town:</span>  {{ $dummy->city }}
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <span class="title2">Postal Code:</span>  {{ $dummy->postcode }}
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <span class="title2">Email:</span>  {{ $dummy->email }}
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <span class="title2">Telephone:</span>  {{ $dummy->phone }}
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <span class="title2">Date of Birth:</span>  {{ $dummy->birth }}
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <span class="title2">N.I. number:</span>  {{ $dummy->ninumber }}
                                                </div>

                                                <div class="col-md-6">                                                    
                                                    <a href=" {{ $dummy->file1 }}">View Attached file1</a>
                                                </div>

                                                <div class="col-md-6">                                                    
                                                    <a href=" {{ $dummy->file2 }}">View Attached file2</a>
                                                </div>
                                             
                                            </div>
            
                                        </td>
                                    </tr>
                                    @endforeach
                    
                                </tbody>
                            </table>
                            {!! $proposals->render() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('css')
   <style>
       td{
           font-size: 16px !important;
       }
       .title2{ 
           font-weight: 800;
           padding: 5px 0;
       }
    </style>
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>


@endpush
@extends('layouts.backend', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Jobs') }}</div>

                    <div class="card-body">
                        <div class="text-right">
                            <a href="{{route('createJob')}}">
                                <button class="btn btn-primary">Create Job</button>
                            </a>                       
                        </div>

                        <div class="table-responsive py-4">
                            <table class="table align-items-center table-flush text-center"  id="datatable-basic">
                                <thead class="thead-light">
                                    <tr> 
                                        <th style="display: none"></th>
                                        <th scope="col">{{ __(' Title') }}</th>                                  
                                        <th scope="col">{{ __(' Subtitle') }}</th>
                                        <th scope="col">{{ __(' Price') }}</th> 
                                        <th scope="col">{{ __(' Timeline') }}</th>  
                                        <th scope="col">{{ __(' Description') }}</th>                                                                        
                                        <th scope="col"></th>                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $option)
                                        <tr>         
                                            <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                            <input type="hidden" name="title" class="title" value="{{$option->title}}" />
                                            <input type="hidden" name="subtitle" class="subtitle" value="{{$option->subtitle}}" />
                                            <input type="hidden" name="price" class="price" value="{{$option->price}}" />
                                            <input type="hidden" name="timeline" class="timeline" value="{{$option->timeline}}" />
                                            <input type="hidden" name="description" class="description" value="{{$option->description}}" />

                                            <td style="display: none"> {{ $option->created_at }} </td>
                                            <td> {{ $option->title }} </td>
                                            <td> {{ $option->subtitle }} </td>                                            
                                            <td>&#163; {{ $option->price }} P/H</td>
                                            <td>{{ $option->timeline }}</td>   
                                            <td> {{ $option->description }} </td>                                               
                                            
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">  
                                                        <a href="#" class="dropdown-item  modal-btn2" data-id="{{$option->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>Edit</a>
                                                        <a href="{{route('jobDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="post" id="edit_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Edit Job')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" class="id" id ="id1" />

                        <div class="form-group row">
                            <label for="title1" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
    
                            <div class="col-md-6">
                                <input id="title1" type="text" class="form-control title @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
    
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subtitle1" class="col-md-4 col-form-label text-md-right">{{ __('SubTitle') }}</label>

                            <div class="col-md-6">
                                <input id="subtitle1" type="text" class="form-control subtitle @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}" autocomplete="subtitle" autofocus>

                                @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price1" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price1" type="text" class="form-control price @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="timeline1" class="col-md-4 col-form-label text-md-right">{{ __('Timeline') }}</label>

                            <div class="col-md-6">
                                <input id="timeline1" type="text" class="form-control timeline @error('timeline') is-invalid @enderror" name="timeline" value="{{ old('timeline') }}" autocomplete="timeline" autofocus>

                                @error('timeline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                            <div class="col-md-6">
                                <textarea name="description" id="description1" cols="30" rows="5" class="form-control description @error('description') is-invalid @enderror" autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                                    
                    </div>              
                    
                    <div class="modal-footer">    
                        <button type="button" class="btn btn-primary btn-submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>&nbsp;{{ __('Save')}}</button>                       
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>&nbsp;{{ __('Close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
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

    <script>
        $(document).ready(function(){
            $(document).on('click', '.modal-btn2', function (){
                let id = $(this).data('id');
                let title = $(this).parents('tr').find('.title').val().trim();     
                let subtitle = $(this).parents('tr').find('.subtitle').val().trim();     
                let price = $(this).parents('tr').find('.price').val().trim();     
                let timeline = $(this).parents('tr').find('.timeline').val().trim();     
                let description = $(this).parents('tr').find('.description').val().trim();    
    
                $("#edit_form .id").val(id);
                $("#edit_form .title").val(title);
                $("#edit_form .subtitle").val(subtitle);
                $("#edit_form .price").val(price);
                $("#edit_form .timeline").val(timeline);
                $("#edit_form .description").val(description);
                        
                $("#editModal").modal();
            });
    
            $("#edit_form").submit(function(e){
                e.preventDefault();
            });
    
            $("#edit_form .btn-submit").click(function(){
                let _token = $('input[name=_token]').val();
                let id = $('#id1').val();
                let title = $('#title1').val();
                let subtitle = $('#subtitle1').val();
                let price = $('#price1').val();
                let timeline = $('#timeline1').val();
                let description = $('#description1').val();                   
    
                var form_data =new FormData();
            
                form_data.append("_token", _token);
                form_data.append("id", id);
                form_data.append("title", title);
                form_data.append("subtitle", subtitle);
                form_data.append("price", price);
                form_data.append("timeline", timeline);
                form_data.append("description", description);
               
    
                $.ajax({
                    url: "{{route('updateJob')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success : function(response) {
                        if(response == 'success') {  
                            window.location.reload();                          
                        } else {
                            let messages = response.data;
                            console.log(messages);
                        }
                    },
                    error: function(err) {
                        if (err.status == 422) { 
                            console.log(err.responseJSON);
                            $('#success_message').fadeIn().html(err.responseJSON.message);
                            console.warn(err.responseJSON.errors);
                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');
                                el.after($('<span style="color: red;">'+error[0]+'</span>'));
                            });
                        }
                    }
                });
            });
        });
    </script>

@endpush
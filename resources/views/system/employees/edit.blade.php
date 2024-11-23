@extends('admin_temp')
@section('section_name')
 {{__('system.departments')}}
@endsection
@section('content')


<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">

        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label"> {{__('system.tasks')}}</h3>
                </div>

            </div>

            <div class="card-body">
                <form method="post" action="{{route('employees.update',$employee->id)}}"  enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <div class="modal-body" id="product_detailes">
                        <div class="row">


                            <div class="col-lg-6 col-xl-6">
                                <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                    <label>{{ __('system.img') }}</label>
                                    <div class="image-input-wrapper" style="background-image: url({{$employee->image}})" ></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="{{__('system.add_img')}}">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="{{__('system.remove_img')}}">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                {{-- <span class="form-text text-muted">{{__('dashboard.allowed_file')}}</span> --}}
                            </div>




                            <div class="col-6">
                                <div>
                                    <label>{{ __('system.first_name') }}</label>
                                    <input class="form-control" name="first_name"   value="{{(old('first_name')) ? old('first_name')  : $employee->first_name }}"  type="text" required>
                                    @error('first_name')
                                        <div class="text-danger"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div>
                                    <label>{{ __('system.last_name') }}</label>
                                    <input class="form-control" name="last_name"   value="{{(old('last_name')) ? old('last_name')  : $employee->last_name }}"  type="text" required>
                                        @error('last_name')
                                            <div class="text-danger"> {{$message}} </div>
                                        @enderror
                                </div>
                            </div>


                            <div class="col-6">
                                <div>
                                    <label>{{ __('system.phone') }}</label>
                                    <input class="form-control" name="phone"  value="{{(old('phone')) ? old('phone')  : $employee->phone }}" type="text" required>
                                    @error('phone')
                                        <div class="text-danger"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div>
                                    <label>{{ __('system.email') }}</label>
                                    <input class="form-control" name="email"   value="{{(old('email')) ? old('email')  : $employee->email }}" type="email" required>
                                    @error('email')
                                        <div class="text-danger"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div>
                                    <label>{{ __('system.salary') }}</label>
                                    <input class="form-control" name="salary"   value="{{(old('salary')) ? old('salary')  : $employee->salary }}" type="text" required>
                                    @error('salary')
                                        <div class="text-danger"> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-6">
                                <label>{{ __('system.manager') }}</label>
                                <select class="form-control" name="manager_id" id="emp_id">
                                    <option value="{{Auth::user()->id}}" selected> {{Auth::user()->fullName}} </option>
                                      @foreach ($employees as $row)
                                       @if ($row->id != $employee->id)
                                         <option value="{{$row->id}}"> {{$row->fullName}} </option>
                                       @endif
                                      @endforeach
                                </select>
                            </div>





                        </div>

                        <input type="submit" class="btn btn-primary mt-2" value="{{__('system.save')}}">


                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
 {{--begain::add task model --}}


{{--end::add task model --}}



@endsection
@section('scripts')
 <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>
@endsection

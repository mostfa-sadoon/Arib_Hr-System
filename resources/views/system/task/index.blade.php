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
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#AddDepartment">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>{{__('system.add_task')}}</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('system.title_desc') }}</th>
                                <th>{{ __('system.desctiption') }}</th>
                                <th>{{ __('system.employee') }}</th>
                                <th>{{ __('system.status') }}</th>

                                <th>{{ __('system.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key=>$row)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->translate('ar')->name}}</td>
                                <td>{{$row->translate('en')->name}}</td>

                                <td nowrap="nowrap">


                                    <span class="svg-icon svg-icon-md svg-icon-primary">

                                        <a href="" class="edit"  data-id="{{$row->id}}" data-toggle="modal" data-target="#EditDepartment">

                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                        </a>

                                    </span>


                                    <a href="{{route('tasks.destroy',$row->id)}}" class="delete_department" data-id="{{$row->id}}" data-toggle="modal" data-target="#deleteDepartment" onclick="confirmDelete(event, {{ $row->id }})">

                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>

                                    </a>


                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>


        </div>
    </div>



            {{--begain::edit task model --}}
                <div class="modal fade outer-repeater" id="EditDepartment" tabindex="-1" role="dialog" aria-labelledby="EditDepartment" aria-hidden="true">
                    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">


                        <div class="modal-content">
                            <div class="modal-header">
                            <h2 class="modal-title bold"  id="exampleModalLabel">{{__('system.edit')}}</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <form method="post" action="{{route('tasks.update',0)}}">
                                @csrf
                                <input type="hidden" name="id" value="" id="task_id">
                                <div class="modal-body" id="task_detailes">

                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            {{--end::edit task model --}}


            {{--begain::add task model --}}
                <div class="modal fade outer-repeater" id="AddDepartment" tabindex="-1" role="dialog" aria-labelledby="AddDepartment" aria-hidden="true">
                    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">


                        <div class="modal-content">
                            <div class="modal-header">
                            <h2 class="modal-title bold"  id="exampleModalLabel">{{__('system.add_department')}}</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <form method="post" action="{{route('tasks.store')}}">
                                @csrf
                                <div class="modal-body" id="product_detailes">
                                    <div class="row">

                                        <div class="col-6">
                                            <div>
                                                <label>{{ __('system.title') }}</label>
                                                <input class="form-control" name="title"   value="" type="text" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div>
                                                <label>{{ __('system.description') }}</label>
                                                <input class="form-control" name="description"   value="" type="text" required>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <label>{{ __('system.assign_to') }}</label>
                                            <select class="form-control" name="emp_id">
                                                  @foreach ($employees as $employee)
                                                    <option value="{{$employee->id}}"> {{$employee->fullName}} </option>
                                                  @endforeach
                                            </select>
                                        </div>



                                        <div class="col-6">
                                            <label>{{ __('system.status') }}</label>
                                            <select class="form-control" name="status_id">
                                                  @foreach ($taskStatus as $row)
                                                    <option value="{{$row->id}}"> {{$row->name}} </option>
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
            {{--end::add task model --}}

@endsection



@section('scripts')
<script>
    // start delete campaign
    function confirmDelete(event, id) {
        event.preventDefault(); // Prevents immediate navigation

        // Show confirmation dialog
        if (confirm("Are you sure you want to delete this item?")) {
            // Proceed with deletion if confirmed
            window.location.href = event.currentTarget.href;
        }
    }


    // start edit
    $('#datatable').on('click','.edit',function (){
         var id=$(this).attr("data-id");

         $.ajax({
                url:"/tasks/edit/"+id,
                type:"GET", //send it through get method
                success: function (response) {
                    $('#task_detailes').html(response);
                },
                error: function(response) {

                }
         });



        $('#EditDepartment').modal('show');
        $('#task_id').val(id);

    });
</script>

@endsection



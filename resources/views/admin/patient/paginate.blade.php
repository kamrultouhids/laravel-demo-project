<div class="table-responsive">
    <table  class="table table-bordered">
        <thead>
        <tr class="tr_header">
            <th>S/L</th>
            <th>Photo</th>
            <th>Patient Code</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Sex</th>
            <th>Blood Group</th>
            <th>Centre</th>
            <th style="text-align: center;">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data) > 0)
            {!! $sl=null !!}
            @foreach($data AS $value)
                <tr class="{!! $value->patient_id !!}" style="cursor: pointer;" onclick='window.location.assign("{!!route('patient.show',$value->patient_id  )!!}")' data-toggle="tooltip" title="View Patient Details">
                    <td style="width: 50px;">{!! ++$sl !!}</td>
                    <td>
                        @if($value->avatar_file!='' && file_exists(\App\Lib\Enumerations\ImagePaths::$PATIENT_PROFILE.'/'.$value->avatar_file))
                            <img style=" width: 70px; " src="{!! asset(\App\Lib\Enumerations\ImagePaths::$PATIENT_PROFILE.'/'.$value->avatar_file) !!}" alt="user-img" class="img-circle">
                        @else
                            <img style=" width: 70px; " src="{!! asset('admin_assets/img/default.png') !!}" alt="user-img" class="img-circle">
                        @endif
                    </td>
                    <td>{!! $value->patient_code !!}</td>
                    <td>{!! $value->patient_name !!}</td>
                    <td> @if($value->phone_no !='') 0{!! $value->phone_no !!}@endif </td>
                    <td>{!! $value->patient_email !!}</td>
                    <td>{!! $value->sex !!}</td>
                    <td>{!! $value->blood_group !!}</td>
                    <td>
                        @if(isset($value->centre->title))
                            {!! $value->centre->title !!}
                        @endif
                    </td>

                    <td style="width: 100px;">
                        <a href="{!! route('patient.edit',$value->patient_id) !!}"  class="btn btn-success btn-sm btnColor">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a href="{!! route('patient.destroy',$value->patient_id  )!!}" data-token="{!! csrf_token() !!}" data-id="{!! $value->patient_id !!}" class="delete btn btn-danger btn-sm deleteBtn btnColor"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10" class="text-center">No data available </td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{$data->links()}}
    </div>
</div>
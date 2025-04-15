
<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/doctors.doctors_status')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="{{route('update_status',$doctor->id)}}" method="post">

                    {{csrf_field()}}

                <div class="modal-body">

                <div class="form-group">
                        <label for="status">{{trans('Dashboard/doctors.doctors_status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>--{{trans('Dashboard/doctors.doctors_choose')}}--</option>
                            <option value="1">{{trans('Dashboard/doctors.Enabled')}}</option>
                            <option value="0">{{trans('Dashboard/doctors.Not_enabled')}}</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/doctors.close')}}</button>
                    <button type="submit"   class="btn btn-success">{{trans('Dashboard/doctors.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

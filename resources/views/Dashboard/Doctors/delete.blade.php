
<div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/doctors.delete_section')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="{{route('Doctors.destroy',$doctor->id)}}" method="post">
                {{method_field('delete')}}
                @csrf
                <div class="modal-body">
                    <label  class="PasswordExample1">{{trans('Dashboard/doctors.mesg')}}</label>
                <input type="hidden" value="1" name="page_id">
                    @if($doctor->image)
                    <input type="hidden"  name="filename" value="{{$doctor->image->filename}}">
                    @endif
                    <input type="hidden"  name="id" value="{{$doctor->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/doctors.close')}}</button>
                    <button type="submit"   class="btn btn-danger">{{trans('Dashboard/doctors.del')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="delete_select" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('Dashboard/sections_trans.delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Doctors.destroy','test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5>{{trans('Dashboard/sections_trans.Warning')}}</h5>
                    <input type="hidden" id="delete_select_id" name="delete_select_id" value=''>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/doctors.close')}}</button>
                    <button type="submit" class="btn btn-danger">{{trans('Dashboard/doctors.del')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

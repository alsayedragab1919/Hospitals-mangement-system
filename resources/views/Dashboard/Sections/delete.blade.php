
<div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/sections_trans.delete_sections')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="{{route('Sections.destroy',$section->id)}}" method="post">
                {{method_field('delete')}}
                @csrf
                <div class="modal-body">
                    <label  class="PasswordExample1">{{trans('Dashboard/sections_trans.Warning')}}</label>
                    <input type="hidden"  name="id" value="{{$section->id}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/main-sidebar-trans.Close')}}</button>
                    <button type="submit"   class="btn btn-danger">{{trans('Dashboard/sections_trans.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>



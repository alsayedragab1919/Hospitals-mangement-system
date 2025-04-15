
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/sections_trans.edit_sections')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="{{route('Sections.update',$section->id)}}" method="post" autocomplete="off">
                {{method_field('patch')}}
                @csrf
                <div class="modal-body">
                    <label  class="PasswordExample1">{{trans('Dashboard/sections_trans.edit_sections')}}</label>
                    <input type="hidden"  name="id" value="{{$section->id}}">
                    <input type="text"  name="name" value="{{$section->name}}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/main-sidebar-trans.Close')}}</button>
                    <button type="submit"   class="btn btn-primary">{{trans('Dashboard/sections_trans.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>



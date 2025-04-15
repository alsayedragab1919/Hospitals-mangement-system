
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/sections_trans.add_sections')}}</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('Sections.store')}}" method="Post" autocomplete="off">
              @csrf
            <div class="modal-body">
              <label name="example">{{trans('Dashboard/main-sidebar-trans.name_section')}}</label>
              <input type="text" name="name" class="form-control" >
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/main-sidebar-trans.Close')}}</button>
        <button type="submit"  name="submit" class="btn btn-primary">{{trans('Dashboard/sections_trans.save')}}</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit{{ $laboratorie_employee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Dashboard/Laboratory.edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Laboratorie_Employee.update', $laboratorie_employee->id) }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{__('Dashboard/Laboratory.name')}}</label>
                    <input type="text" value="{{$laboratorie_employee->name}}" name="name" class="form-control"><br>

                    <label for="exampleInputPassword1">{{__('Dashboard/Laboratory.email')}}</label>
                    <input type="email" value="{{$laboratorie_employee->email}}" name="email" class="form-control"><br>

                    <label for="exampleInputPassword1">{{__('Dashboard/Laboratory.password')}}</label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password">

                    <label for="exampleInputPassword1">{{__('Dashboard/Laboratory.con_pass')}}</label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/sections_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/sections_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

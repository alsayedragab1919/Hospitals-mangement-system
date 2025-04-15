@if(count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="Close" data-dismiss="alert" type="button">
        <span aria-hidden="true"></span>
    </button>
    <strong>{{__('Dashboard/messages.error')}}</strong>
    <ul>
    @foreach($errors->all as $error)
        <li>{{$error}}</li>>
    @endforeach
    </ul>
</div>
@endif

@if(session()->has('add'))
    <script>
        window.onload = function (){
            notif({
                    msg: "{{trans('Dashboard/messages.add')}}",
                    type: "success"
            });
        }
    </script>
@endif





@if(session()->has('edit'))
    <script>
        window.onload = function (){
            notif({
                msg: "{{trans('Dashboard/messages.edit')}}",
                type: "success"
            });
        }
    </script>
@endif





@if(session()->has('delete'))
    <script>
        window.onload = function (){
            notif({
                msg: "{{trans('Dashboard/messages.delete')}}",
                type: "success"
            });
        }
    </script>
@endif

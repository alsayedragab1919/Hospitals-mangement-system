<div>
    @if($message === true)
        <script>
            alert('{{trans('Website/Website.message1')}}')
            location.reload()
        </script>
    @endif

        @if($message2 === true)
            <script>
                alert('{{trans('Website/Website.message2')}}')
                location.reload()
            </script>
        @endif

    <form wire:submit.prevent="store">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="username" wire:model="name" placeholder="{{__('Website/Website.name')}}" required="">
                <span class="icon fa fa-user"></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" name="email" wire:model="email" placeholder="{{__('Website/Website.email')}}" required="">
                <span class="icon fa fa-envelope"></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">{{__('Website/Website.doctors')}}</label>
                <select name="doctor" wire:model="doctor" class="form-select" id="exampleFormControlSelect1">
                    @foreach($doctors as $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">{{__('Website/Website.section')}}</label>
                <select class="form-select" name="section" wire:model="section" id="exampleFormControlSelect1">
                    <option>-- {{__('Website/Website.chose_from_list')}} --</option>
                    @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">{{__('Dashboard/patient.boold_type')}}</label>
                <select class="form-select" name="Blood_Group" wire:model="Blood_Group" id="exampleFormControlSelect1">
                    <option value="" selected>{{__('Dashboard/patient.chose')}}</option>
                    <option value="O-">{{__('Dashboard/patient.O-')}}</option>
                    <option value="O+">{{__('Dashboard/patient.O+')}}</option>
                    <option value="A+">{{__('Dashboard/patient.A+')}}</option>
                    <option value="A-">{{__('Dashboard/patient.A-')}}</option>
                    <option value="B+">{{__('Dashboard/patient.B+')}}</option>
                    <option value="B-">{{__('Dashboard/patient.B-')}}</option>
                    <option value="AB+">{{__('Dashboard/patient.AB+')}}</option>
                    <option value="AB-">{{__('Dashboard/patient.AB-')}}</option>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>{{__('Dashboard/patient.patient_gender')}}</label>
                <select class="exampleFormControlSelect1" name="Gender" wire:model="Gender" id="exampleFormControlSelect1">
                    <option value="" selected>{{__('Dashboard/patient.chose')}}</option>
                    <option value="{{__('Dashboard/patient.male')}}">{{__('Dashboard/patient.male')}}</option>
                    <option value="{{__('Dashboard/patient.female')}}">{{__('Dashboard/patient.female')}}</option>
                </select>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="tel" name="phone" wire:model="phone" placeholder="{{__('Website/Website.phone')}}" required="">
                <span class="icon fas fa-phone"></span>
            </div>

            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">{{__('Website/Website.date')}}</label>
                <input type="date" name="appointment_patient" wire:model="appointment_patient" required
                       class="form-control">
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="notes" wire:model="notes" placeholder="{{__('Website/Website.notes')}}"></textarea>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                    <span class="txt">{{__('Website/Website.save')}}</span></button>
            </div>
        </div>
    </form>
</div>

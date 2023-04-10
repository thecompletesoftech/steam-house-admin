<div class="card-body">


    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">Location</label>
        <div class="col-lg-4 fv-row">
       {{-- {!! Form::text('manager', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.managers', 1)]) !!} --}}
       <select class="form-control form-control-solid" name="address">
           <option >--Select location--</option>
           @foreach($location as $data)

           <option value="{{ $data->location_id }}" {{  $user->address == $data->location_id   ? 'selected' : '' }} >{{$data->location}}</option>
   @endforeach
       </select>
   </div>


   <label class="col-lg-2 col-form-label required fw-bold fs-6">Manager</label>
   <div class="col-lg-4 fv-row">
  {{-- {!! Form::text('manager', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.managers', 1)]) !!} --}}
  <select class="form-control form-control-solid" name="manager_id">
      <option  value="" >--Select Manager--</option>
      @foreach($manager as $data)

      <option value="{{ $data->id }}" {{  $user->manager_id == $data->id   ? 'selected' : '' }} >{{$data->name}}</option>
@endforeach
  </select>
   </div>





    </div>


    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.c_name', 1) }}</label>
        <div class="col-lg-4 fv-row">
            {!! Form::text('name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.c_name', 1)]) !!}
        </div>

             <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.meter_id', 1) }}</label>
        <div class="col-lg-4 fv-row">
            {!! Form::text('meter_id', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.meter_id', 1)]) !!}
        </div>
    </div>



        <div class="row mb-6">

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.phone', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::number('phone', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_number', 1)]) !!}
                </div>



        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.email', 1) }}</label>
        <div class="col-lg-4 fv-row">
            {!! Form::text('email', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_email', 1)]) !!}
        </div>


        </div>


        <div class="row mb-6">




            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.image', 1) }}</label>
            <div class="col-lg-4 fv-row">
                <input type="file" name="image" class="form-control form-control-lg form-control-solid">
                @if($user->image)
                <img src="{{ url('/') }}/uploads/{{$user->image}}" style="width:50px; height:50px;" />

                @endif
            </div>


            {{-- <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_username', 1) }}</label>
            <div class="col-lg-4 fv-row">
                {!! Form::text('username', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_username', 1)]) !!}
            </div> --}}

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_username', 1) }}</label>
            <div class="col-lg-4 fv-row">

                <input type="text" class="form-control form-control-lg form-control-solid" value="{{$user->username}}" readonly>
            </div>



        </div>

        <div class="row mb-6">


            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.password', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    <input min="2" max="6"  class="form-control form-control-lg form-control-solid is-valid" placeholder="password" name="password" type="text" aria-describedby="password-error" aria-invalid="false">
                </div>
                <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.c_password', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('c_password', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_confirm_password', 1)]) !!}
                </div>
        </div>

        <div class="row mb-6">

            <label class="col-lg-2 col-form-label required fw-bold fs-6">Address</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('c_address', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_address', 1)]) !!}
                </div>
                <label class="col-lg-2 col-form-label required fw-bold fs-6">Latitude</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('latitude ', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.latitude', 1)]) !!}
                </div>

        </div>


        <div class="row mb-6">

            <label class="col-lg-2 col-form-label required fw-bold fs-6">Longitude</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('longitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.longitude', 1)]) !!}
                </div>
                <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.about', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('about', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_about', 1)]) !!}
                </div>

        </div>



        <div class="row mb-6">



                <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.role', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    <select class="form-control form-control-solid" name="role">
                        <option value="0">User</option>
                    </select>
                </div>
        </div>


    </div>
    <!--end::Card body-->

    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\Admin\CompanyEditRequest', 'form') !!}
    @endpush

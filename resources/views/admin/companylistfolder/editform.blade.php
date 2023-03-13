<div class="card-body">


    <div class="row mb-6">
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ trans_choice('content.image', 1) }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">

                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                    style="background-image: url(assets/media/avatars/blank.png)">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('')">
                    </div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                <!--end::Hint-->
            </div>
            <!--end::Col-->
        </div>
    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.meter_id', 1) }}</label>
        <div class="col-lg-4 fv-row">
            {!! Form::text('meter_id', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.meter_id', 1)]) !!}
        </div>
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.manager', 1) }}</label>
            <div class="col-lg-4 fv-row">
                    {{-- {!! Form::text('manager', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.managers', 1)]) !!} --}}
                    <select class="form-control form-control-solid" name="manager_id">
                        {{-- <option >--Select Manager--</option> --}}
                        @foreach($manager as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
                    </select>
                </div>
        {{-- <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.image', 1) }}</label>
        <div class="col-lg-4 fv-row">
            {!! Form::file('image', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.imagess', 1)]) !!}
        </div> --}}



    </div>


    <div class="row mb-6">


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.username', 1) }}</label>
        <div class="col-lg-4 fv-row">
            {!! Form::text('username', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.username', 1)]) !!}
        </div>
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.name', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_name', 1)]) !!}
                </div>


    </div>

        <div class="row mb-6">

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.phone', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('phone', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_number', 1)]) !!}
                </div>
                <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.email', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('email', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_email', 1)]) !!}
                </div>
        </div>
        <div class="row mb-6">

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.password', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('password', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_password', 1)]) !!}
                </div>
                <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.c_password', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('c_password', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_confirm_password', 1)]) !!}
                </div>
        </div>

        <div class="row mb-6">

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.about', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('about', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.registration_about', 1)]) !!}
                </div>
                <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.address', 1) }}</label>
                     <div class="col-lg-4 fv-row">
                    {{-- {!! Form::text('manager', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.managers', 1)]) !!} --}}
                    <select class="form-control form-control-solid" name="address">
                        {{-- <option >--Select location--</option> --}}
                        @foreach($location as $data)
                        <option value="{{$data->location_id}}">{{$data->location}}</option>
                @endforeach
                    </select>
                </div>
        </div>

        {{-- <div class="row mb-6">
            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.latitude', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('latitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.latitude', 1)]) !!}
                </div>
            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.longitude', 1) }}</label>
                <div class="col-lg-4 fv-row">
                    {!! Form::text('longitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.longitude', 1)]) !!}
                </div>
        </div> --}}

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
        {!! JsValidator::formRequest('App\Http\Requests\Admin\CompanyListRequest', 'form') !!}
    @endpush



@extends('admin.user.navbarsidebar')
@section('user_details_breadcrumb')
    @include('admin.layouts.components.header',[
    'title'=> __('messages.detail', ['name' => trans_choice('content.user', 2)]),
    'breadcrumbs'=> Breadcrumbs::render('admin.users.rating')
    ])
@endsection
@section('user_details_tab')
   
        <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>{{ trans_choice('content.profile', 1) }}</h2>
                </div>
               
  
            </div>
          
            <div class="card-body pt-0 pb-5">
                
                <div class="table-responsive">
                    
                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                        
                        <tbody class="fs-6 fw-bold text-gray-600">

                        <tr>
                                <td>Name</td>
                                <td>{{ $user->name }} {{ $user->l_name }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            
                            <tr>
                                <td>Number</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td>About</td>
                                <td>{{ $user->about }}</td>
                            </tr>
                          
                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>
            
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card pt-4 mb-6 mb-xl-9">
            
            <div class="card-header border-0">
               
                <div class="card-title flex-column">
                    <h2>Email Notifications</h2>
                    <div class="fs-6 fw-bold text-muted">Choose what messages you’d like to receive for
                        each of your accounts.</div>
                </div>
           
            </div>
           
            <div class="card-body">
              
                <form class="form" id="kt_users_email_notification_form">
                   
                    <div class="d-flex">
                     
                        <div class="form-check form-check-custom form-check-solid">
                           
                            <input class="form-check-input me-3" name="email_notification_0" type="checkbox" value="0"
                                id="kt_modal_update_email_notification_0" checked='checked' />
                            
                            <label class="form-check-label" for="kt_modal_update_email_notification_0">
                                <div class="fw-bolder">Successful Payments</div>
                                <div class="text-gray-600">Receive a notification for every successful
                                    payment.</div>
                            </label>
                            
                        </div>
                        
                    </div>
                    <!--end::Item-->
                    <div class='separator separator-dashed my-5'></div>
                    <!--begin::Item-->
                    <div class="d-flex">
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="email_notification_1" type="checkbox" value="1"
                                id="kt_modal_update_email_notification_1" />
                            
                            <label class="form-check-label" for="kt_modal_update_email_notification_1">
                                <div class="fw-bolder">Payouts</div>
                                <div class="text-gray-600">Receive a notification for every initiated
                                    payout.</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    <div class='separator separator-dashed my-5'></div>
                    <!--begin::Item-->
                    <div class="d-flex">
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="email_notification_2" type="checkbox" value="2"
                                id="kt_modal_update_email_notification_2" />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check-label" for="kt_modal_update_email_notification_2">
                                <div class="fw-bolder">Application fees</div>
                                <div class="text-gray-600">Receive a notification each time you
                                    collect a fee from an account.</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    <div class='separator separator-dashed my-5'></div>
                    <!--begin::Item-->
                    <div class="d-flex">
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="email_notification_3" type="checkbox" value="3"
                                id="kt_modal_update_email_notification_3" checked='checked' />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check-label" for="kt_modal_update_email_notification_3">
                                <div class="fw-bolder">Disputes</div>
                                <div class="text-gray-600">Receive a notification if a payment is
                                    disputed by a customer and for dispute resolutions.</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    <div class='separator separator-dashed my-5'></div>
                    <!--begin::Item-->
                    <div class="d-flex">
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="email_notification_4" type="checkbox" value="4"
                                id="kt_modal_update_email_notification_4" checked='checked' />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check-label" for="kt_modal_update_email_notification_4">
                                <div class="fw-bolder">Payment reviews</div>
                                <div class="text-gray-600">Receive a notification if a payment is
                                    marked as an elevated risk.</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    <div class='separator separator-dashed my-5'></div>
                    <!--begin::Item-->
                    <div class="d-flex">
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="email_notification_5" type="checkbox" value="5"
                                id="kt_modal_update_email_notification_5" />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check-label" for="kt_modal_update_email_notification_5">
                                <div class="fw-bolder">Mentions</div>
                                <div class="text-gray-600">Receive a notification if a teammate
                                    mentions you in a note.</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    <div class='separator separator-dashed my-5'></div>
                    <!--begin::Item-->
                    <div class="d-flex">
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="email_notification_6" type="checkbox" value="6"
                                id="kt_modal_update_email_notification_6" />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check-label" for="kt_modal_update_email_notification_6">
                                <div class="fw-bolder">Invoice Mispayments</div>
                                <div class="text-gray-600">Receive a notification if a customer sends
                                    an incorrect amount to pay their invoice.</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    <div class='separator separator-dashed my-5'></div>
                    <!--begin::Item-->
                    <div class="d-flex">
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="email_notification_7" type="checkbox" value="7"
                                id="kt_modal_update_email_notification_7" />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check-label" for="kt_modal_update_email_notification_7">
                                <div class="fw-bolder">Webhooks</div>
                                <div class="text-gray-600">Receive notifications about consistently
                                    failing webhook endpoints.</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    <div class='separator separator-dashed my-5'></div>
                    <!--begin::Item-->
                    <div class="d-flex">
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="email_notification_8" type="checkbox" value="8"
                                id="kt_modal_update_email_notification_8" />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check-label" for="kt_modal_update_email_notification_8">
                                <div class="fw-bolder">Trial</div>
                                <div class="text-gray-600">Receive helpful tips when you try out our
                                    products.</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end align-items-center mt-12">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-light me-5"
                            id="kt_users_email_notification_cancel">Cancel</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="button" class="btn btn-primary" id="kt_users_email_notification_submit">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--begin::Action buttons-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <!--end::Card footer-->
        </div>
        <!--end::Card-->
    </div>
    <!--end:::Tab pane-->
@endsection

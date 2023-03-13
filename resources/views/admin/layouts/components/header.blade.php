@php
$title = isset($title) ? $title : 'Common-Setup';
$filter = isset($filter) ? $filter : false;
$export['status'] = isset($export['status']) ? $export['status'] : false;
$create_btn['status'] = isset($create_btn['status']) ? $create_btn['status'] : false;

$btn['status'] = isset($btn['status']) ? $btn['status'] : false;
$btn['classname'] = isset($btn['classname']) ? $btn['classname'] : 'btn-primary';

$import['status'] = isset($import['status']) ? $import['status'] : false;
@endphp
<!--begin::Custom Page Header Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-place="true" data-kt-place-mode="prepend"
            data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{ $title }}</h1>
            <!--end::Title-->

            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->

            <!--begin::Breadcrumb-->
            @if (isset($breadcrumbs))
                {!! $breadcrumbs !!}
            @endif
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            @if ($filter == true)
                <!--begin::Filter-->
                <button type="button" class="btn btn-light-primary me-3" id="kt_drawer_filter_button">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                    fill="#000000" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->{{ trans_choice('content.filter', 1) }}
                </button>
                <!--end::Filter-->
            @endif
            @if ($import['status'] == true)
                @if (isset($import['route']) && isset($import['format_file_route']))
                    <!--begin::Wrapper-->
                    <div class="me-4">
                        <!--begin::Menu-->
                        <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                            data-kt-menu-flip="top-end">
                            <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                            fill="#000000" />
                                    </g>
                                  
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{ trans_choice('content.import', 1) }}
                        </a>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-500px w-md-500px" data-kt-menu="true">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">{{ trans_choice('content.select_file', 1) }}
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <form action="{{ $import['route'] }} " method="post" id='import_data'
                                class="form" enctype="multipart/form-data">
                                @csrf
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <label
                                            class="form-label fw-bold">{{ trans_choice('content.import', 1) }}:</label>
                                        <div> 
                                           
                                            <input type="file" name="file" class="form-control"
                                                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                                required>
                                        </div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">

                                        <button type="button" class="btn btn-primary me-2">
                                            <a href="{{ $import['format_file_route'] }}" target="_blank"
                                                class="text-white">{{ __('content.download_format_title') }}</a>
                                        </button>

                                        <button type="submit"
                                            class="btn btn-sm btn-info me-2">{{ __('content.import_title') }}</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                            </form>
                            {{-- {!! Form::close() !!} --}}
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Wrapper-->
                @endif
            @endif
            @if ($export['status'] == true)
                @if (isset($export['route']))
                    <!--begin::Export-->
                    <a href="javascript:void(0)" class="btn btn-info me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                        <!--begin::Svg Icon-->
                        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                            <i class="fas fa-download fw-bold-3"></i>
                        </span>
                        <!--end::Svg Icon-->{{ isset($export['name']) ? $export['name'] : __('content.export_title') }}
                    </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-info fw-bold fs-7 w-125px py-4"
                        data-kt-menu="true">
                        <input type="hidden" id="export_type" name="export" value="">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-item px-3">
                                <a target="_blank" href="{{ $export['route'] }}?export=excel" title="Excel"
                                    data-type="excel" class="menu-link px-3">{{ __('content.excel_title') }} </a>
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-item px-3">
                                <a target="_blank" href="{{ $export['route'] }}?export=csv" title="CSV"
                                    data-type="csv" class="menu-link px-3">{{ __('content.csv_title') }} </a>
                            </div>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Export-->
                @endif
            @endif
            @if ($create_btn['status'] == true)
                @if (isset($create_btn['route']) && isset($create_btn['name']))
                    <!--begin::Add button-->
                    <a href="{{ $create_btn['route'] }}" type="button" class="btn btn-primary me-3">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                    x="4" y="11" width="16" height="2" rx="1" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->{{ $create_btn['name'] }}
                    </a>
               
                @endif
            @endif
            @if ($btn['status'] == true)
                @if (isset($btn['route']) && isset($btn['name']))
               
                    <a href="{{ $btn['route'] }}" type="button"
                        class="btn me-3 {{ $btn['classname'] }}">{{ $btn['name'] }}</a>
                    
                @endif
            @endif
        </div>
 

        


    </div>
 
</div>


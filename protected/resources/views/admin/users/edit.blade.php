<x-app-layout>

    <!--begin::Card-->
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title d-block">
                <h2>Update User</h2>
                <h4 class="fw-bold fs-6 mb-2 mt-2">Management of user</h4>
            </div>
            <!--begin::Card title-->
        </div>
        <div class='separator separator-dashed my-5'></div>
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Form-->
            <form id="form_update_user" class="form" action="#">
                @csrf
                <input type="hidden" name="token" value="{{ $data->token }}">
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="d-block fw-bold fs-6 mb-5">Image</label>
                        <!--end::Label-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url('{{ asset('tadmin/media/svg/avatars/blank.svg') }}')">
                            @if (!$data->image)
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url({{ asset('tadmin/image/gallery.png') }});">
                                </div>
                                <!--end::Preview existing avatar-->
                            @else
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url({{ $data->image }});">
                                </div>
                                <!--end::Preview existing avatar-->
                            @endif
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill Full name" value="{{ $data->name }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill Email" value="{{ $data->email }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Username</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="username" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill Username" value="{{ $data->username }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Password</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill Password" />
                        <!--end::Input-->
                    </div>
                    
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Reason</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea name="alasan" id="alasan" 
                        class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-5">Role</label>
                        <!--end::Label-->
                        <!--begin::Roles-->
                        @foreach ($roles as $key => $role)
                            <!--begin::Input row-->
                            <div class="d-flex fv-row">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" name="user_role" type="radio"
                                        value="{{ $role->id }}" id="kt_modal_update_role_option_{{ $role->id }}"
                                        {{ $data->role_id == $role->id ? 'checked' : '' }} />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">{{ $role->title }}</div>
                                        <div class="text-gray-600">{{ $role->description }}</div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                            <!--end::Input row-->
                            <div class='separator separator-dashed my-5'></div>
                        @endforeach
                        <!--end::Roles-->
                    </div>

                    <!--end::Input group-->
                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <button type="button" class="btn btn-primary" data-kt-users-modal-action="submit">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    @section('scripts')
        <script src="{{ asset('tadmin/js/custom/userUpdate.js') }}"></script>
    @endsection
</x-app-layout>

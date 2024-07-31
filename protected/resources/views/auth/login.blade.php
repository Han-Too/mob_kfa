<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <title>Cashlez - Merchant On Boarding</title>
    <meta charset="utf-8" />
    <meta name="description" content="Cashlez Merchant On Boarding Platform" />
    <meta name="keywords" content="cazhlez, merchant, on boarding, edc, system, platform" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="system" />
    <meta property="og:title" content="Cashlez - Merchant On Boarding" />
    <meta property="og:url" content="https://cashlez.com" />
    <meta property="og:site_name" content="Cashlez" />
    <link rel="canonical" href="https://cashlez.com" />
    <link rel="shortcut icon" href="{{ asset('tadmin/image/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('tadmin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('tadmin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                style="background-color: #e4eaf3">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Content-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-4 pt-lg-20">
                        <!--begin::Logo-->
                        <a href="" class="py-5 mb-5">
                            <img alt="Logo" src="{{ asset('tadmin/image/logo-dark.png') }}" class="h-100px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder fs-2qx pb-2 pb-md-1" style="color: #293841;">Welcome to Cashlez</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="fw-bold fs-2" style="color: #b89356;">Merchant On Boarding Platform</p>
                        <!--end::Description-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Illustration-->
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url({{ asset('tadmin/image/cashlez-feature.png') }}"></div>
                    <!--end::Illustration-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100" method="POST" action="{{ route('login') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Sign In Mob Cashlez</h1>
                                <!--end::Title-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    name="username" autocomplete="off" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Link-->
                                    {{-- <a href="../../demo8/dist/authentication/layouts/aside/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a> --}}
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    name="password" autocomplete="off" required />
                                <!--end::Input-->
                            </div>
                            <x-input-error :messages="$errors->get('username')" />
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="fv-row mb-10">
                                {{-- <img src="{{ captcha_src('flat') }}" alt="captcha"> --}}
                                <img src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()"
                                    id="captchaCode" alt="" class="captcha">
                                <a rel="nofollow" href="javascript:;" class="btn btn-primary mx-3"
                                    onclick="document.getElementById('captchaCode').src='captcha/flat?'+Math.random()"
                                    class="refresh">
                                    refresh
                                </a>
                                {{-- <a href="javascript:void(0)" onclick="refreshCaptcha()">Refresh</a> --}}
                                <div class="mt-2"></div>
                                <input type="text" name="captcha"
                                    class="form-control @error('captcha') is-invalid @enderror"
                                    placeholder="Please Insert Captch">
                                @error('captcha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <!--begin::Submit button-->

                                {{-- <button class="g-recaptcha" data-sitekey="6Lf1zv8pAAAAAGvplt4HDiOrKx819ndS3SWeDiVq"
                                    data-callback='onSubmit' data-action='submit'>
                                    Submit
                                </button> --}}

                                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Login</span>
                                </button>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('tadmin/') }}";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('tadmin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('tadmin/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('tadmin/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>

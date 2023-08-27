<!DOCTYPE html>

<html lang="en">

<head>
    @include('Template.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        {{-- navbar --}}
        @include('Template.navbar')

        {{-- sidebar --}}
        @include('Template.left-sidebar')

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1 class="m-0">Starter Page</h1> --}}
                        </div>
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol> --}}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col">
                            <router-view></router-view>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        {{-- footer --}}
        @include('Template.footer')

    </div>
    @include('Template.script')
</body>

</html>
@inject('carbon', 'Carbon\Carbon')
@extends('admin.template')
@section('title', Auth::user()->name . ' | ' . 'Profile')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-dark card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                   src="{{ (!empty($user->image)) ? url('upload/user_images/' .$user->image) : 'https://ui-avatars.com/api/?background=random&name='.Auth::user()->name }}"
                                >


                            </div>
                            <h3 class="profile-username text-center">
                                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" id="navbarDropdown" href="#"
                                           role="button"
                                           aria-expanded="false">{{auth()->user()->name}}</a>
                                    </li>
                                </ul>
                            </h3>
                            <p class="text-muted text-center" style="text-transform: capitalize">{{$user->role}} | {{$carbon::parse($user->birthday)->age}} years</p>
                            <ul class="list-group list-group-unbordered mb-3" id="info_profile">
                                <li class="list-group-item">
                                    <b>Address</b> <br> <a href="" style="font-size:15px;">{{$user->address}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone Number</b> <br> <a class="">{{$user->phone}}</a>
                                </li>
                            </ul>
                            <div style="margin-bottom: 40px" hidden id="space"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-dark">
                        <div class="card-header p-3">
                            <h3 class="card-title">Edit your profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="settings">
                                    <form method="POST" action="{{route('profile.update')}}"
                                          enctype="multipart/form-data" class="form-horizontal">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input name="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       id="name" placeholder="Full Name" value="{{$user->name}}">
                                                @error('name') <span
                                                    class="text-danger small">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input name="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       id="email" placeholder="Email" value="{{$user->email}}">
                                                @error('email') <span
                                                    class="text-danger small">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="phone_number"
                                                       class="form-control @error('phone_number') is-invalid @enderror"
                                                       id="phone_number" placeholder="Phone Number"
                                                       value="{{$user->phone}}">
                                                @error('phone_number') <span
                                                    class="text-danger small">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input name="address" type="text"
                                                       class="form-control @error('address') is-invalid @enderror"
                                                       id="address" placeholder="Address" value="{{$user->address}}">
                                                @error('address') <span
                                                    class="text-danger small">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-10">
                                                <select class="custom-select form-control @error('gender') is-invalid @enderror" id="gender" name="gender" disabled>
                                                    <option value="Male" {{ ($user->gender == "Male" ? "selected" : "") }}>Male</option>
                                                    <option value="Female" {{ ($user->gender == "Female" ? "selected" : "") }}>Female</option>
                                                </select>
                                                @error('gender') <span
                                                    class="text-danger small">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Profile Photo</label>
                                            <div class="col-sm-10">
                                                <div class="preview-image">
                                                    <img id="photo_preview"
                                                         src="{{ (!empty($user->image)) ? url('upload/user_images/' .$user->image) : 'https://ui-avatars.com/api/?background=random&name='.Auth::user()->name }}"
                                                         class="img-thumbnail"
                                                         style="max-width: 200px; max-height: 200px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file" accept="image/*" class="custom-file-input"
                                                           id="profile_photo" name="profile_photo"
                                                           onchange="previewImage(event)">
                                                    <label class="custom-file-label" for="profile_photo">Choose Image</label>
                                                </div>
                                                @error('profile_photo') <span
                                                    class="text-danger small">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-dark">Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script>
        const previewImage = (event) => {
            const imageFiles = event.target.files;
            const imageFilesLength = imageFiles.length;
            if (imageFilesLength > 0) {
                const imageSrc = URL.createObjectURL(imageFiles[0]);
                const imagePreviewElement = document.querySelector("#photo_preview");
                imagePreviewElement.src = imageSrc;
            }
        };
    </script>
    <script>
        setTimeout(() => {
            document.getElementById('alert').style.display = 'none';
        }, 3000);
    </script>
    <script>
        @if(session()->has('success'))
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Profile Management',
            autohide: true,
            delay: 2500,
            body: '{{ session()->get('success') }}'
        })
        @endif
        @if(session()->has('error'))
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Profile management',
            autohide: true,
            delay: 2500,
            body: '{{ session()->get('error') }}'
        })
        @endif
    </script>
@endsection


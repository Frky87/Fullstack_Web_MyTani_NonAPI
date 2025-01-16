@extends('user.user')

@section('content')
    <section class="section profile">
        <div class="container">
            <div class="row">
                <!-- Profile Card -->
                <div class="col-xl-4">
                    <div class="card mt-4" style="padding-top: 20px;">
                        <div class="card-body profile-card d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile"
                                class="rounded-circle img-thumbnail" style="width: 150px;">
                            <h2 class="mt-3">{{ $user->name }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="col-xl-8">
                    <div class="card mt-4" style="padding-top: 20px;">
                        <div class="card-body">
                            <!-- Tabs Navigation -->
                            <ul class="nav nav-tabs nav-justified">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>
                            </ul>

                            <!-- Tabs Content -->
                            <div class="tab-content mt-3">
                                <!-- Overview Tab -->
                                <!-- Overview Tab -->
                                <div class="tab-pane fade show active" id="profile-overview">
                                    <h5 class="card-title">Profile Details</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                                        <li class="list-group-item"><strong>Phone:</strong>
                                            {{ $user->phone_number ?? 'Not Set' }}</li>
                                        <li class="list-group-item"><strong>Address:</strong>
                                            {{ $user->address ?? 'Not Set' }}</li>
                                    </ul>
                                </div>

                                <!-- Edit Profile Tab -->
                                <div class="tab-pane fade" id="profile-edit">
                                    <form action="{{ route('user.profile.update') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="phone_number" class="form-label">Phone</label>
                                            <input name="phone_number" type="text" class="form-control" id="phone_number"
                                                value="{{ $user->phone_number }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input name="address" type="text" class="form-control" id="address"
                                                value="{{ $user->address }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" id="email"
                                                value="{{ $user->email }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                                    </form>
                                </div>
                            </div><!-- End Tabs Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

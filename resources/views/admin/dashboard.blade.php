@extends('layouts.app')
@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            @if (Session::has('error'))
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                    <div class="text-white">{{ Session::get('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                    <div class="text-white">{{ Session::get('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mt-4">
                <div class="card-body">
                    <div class="product-table">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="user-tabel">
                                <thead class="table-light text-capitalize">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone No</th>
                                        <th>DOB</th>
                                        <th>College Name</th>
                                        <th>Education</th>
                                        <th>Gender</th>
                                        <th>Hobbies</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="product-info">
                                                        {{ $user['fname'] }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user['lname'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $user['username'] }}</td>
                                            <td>
                                                {{ $user['phone_no'] }}
                                            </td>
                                            <td>
                                                {{ $user['dob'] }}
                                            </td>
                                            <td>
                                                {{ $user['college_name'] }}
                                            </td>
                                            <td>
                                                {{ $user['education'] }}
                                            </td>
                                            <td>
                                                {{ $user['gender'] }}
                                            </td>
                                            <td>
                                                @php
                                                    $hobbies = json_decode($user->hobbies, true);
                                                @endphp

                                                <div class="product-tags">
                                                    @if (is_array($hobbies))
                                                        <p>{{ implode(', ', $hobbies) }}</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-sm btn-filter dropdown-toggle dropdown-toggle-nocaret"
                                                        type="button" data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('update-user', ['id' => $user['id']]) }}">Edit</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('delete-user', ['id' => $user['id']]) }}"
                                                                onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone No</th>
                                        <th>DOB</th>
                                        <th>College Name</th>
                                        <th>Education</th>
                                        <th>Gender</th>
                                        <th>Hobbies</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#user-tabel').DataTable();
        });
    </script>
@endsection

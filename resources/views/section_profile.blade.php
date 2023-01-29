@extends('layouts.userprofile')
@section('profile_section')
    <div class="row">
        <div class="col-12 card table-responsive px-0">
            <table class="table table-bordered rounded-top mb-0">
                @foreach($user as $user)
                <tbody>
                    <tr class="profile_header p-0">
                        <th colspan="2" class="text-center"><h5 class="font-weight-bold">PERSONAL DETAILS</h5></th>
                    </tr>
                    <tr class="profile_bg_color">
                        <th>Last Name</th>
                        <td>{{ucfirst($user->l_name)}}</td>
                    </tr>
                    <tr class="profile_bg_color">
                        <th>First Name</th>
                        <td>{{ucfirst($user->f_name)}}</td>
                    </tr>
                    <tr class="profile_bg_color">
                        <th>Email</th>
                        <td>{{ucfirst($user->email)}}</td>
                    </tr>
                    <tr class="profile_bg_color">
                        <th>Username</th>
                        <td>{{ucfirst($user->username)}}</td>
                    </tr>
                    <tr class="profile_bg_color">
                        <th>Phone-Number</th>
                        <td>{{ucfirst($user->phone_number)}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection


<div class="row">
    <div class="col-12 card ">
        <div class="row">
            <div class="col-12 text-center card-header profile_header">PERSONAL DETAILS</div>
        </div>
        <div class="row profile_bg_color">
            <div class="col-12 table-responsive">
                <table class="table table-bordered p-0">
                    @foreach($user as $user)
                    <tbody> 
                        <tr>
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
                            <td>{{($user->username)}}</td>
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
    </div>
</div>
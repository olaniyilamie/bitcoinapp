<div class="row">
    <div class="col-12 card table-responsive">
        <table class="table table-bordered  table-striped my-2">
            @foreach($user as $user)
            <tbody>
                <tr>
                    <th colspan="2" class="text-center text-primary"><h5 class=" font-weight-bold">PROFILE DETAILS</h5></th>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ucfirst($user->l_name)}}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{ucfirst($user->f_name)}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ucfirst($user->email)}}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ucfirst($user->username)}}</td>
                </tr>
                <tr>
                    <th>Phone-Number</th>
                    <td>{{ucfirst($user->phone_number)}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
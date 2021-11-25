@extends('admin.layouts.admin')
@section('content')

    <div class="row">
        <div class=".col-md-6">
            <h3>Create New User</h3>
        </div>
        <!-- <div class="col-md-6 text-right">
            <a href="{{ route('usersCreate') }}" class="btn btn-primary">
                <i class="fa fa-user-plus"></i>
                Create New User
            </a>
        </div> -->
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Manually add password!" v-if="!auto_password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="auto_generate" id="auto_generate" v-model="auto_password">
                            <label for="auto_generate" class="form-check-label">Auto Generate Password</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="roles" class="form-check-label">Roles:</label>
                        <input type="hidden" name="roles" :values="rolesSelected">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    @foreach($roles as $role)
                                        <p>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="rolesSelected"
                                                v-model="rolesSelected" value="{{ $role->id }}"><em>({{ $role->display_name }})</em>
                                            </label>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
@endsection

@section('scripts')
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                auto_password: true,
                rolesSelected: []
            }
        });
    </script>
@endsection
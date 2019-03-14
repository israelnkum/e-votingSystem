@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-danger">Change Password</h4>
                    <form class="m-t-40 needs-validation form-material p-30" method="post" action="{{route('change-password.store')}}" novalidate>
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input type="password" placeholder="New Password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation"  required>
                                    <div class="invalid-feedback">
                                        Password is Mismatch
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right text-right">
                            <button type="submit" class="btn btn-outline-info">Add Voter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
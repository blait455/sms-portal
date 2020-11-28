@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div style="padding: 8px">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        Add Phone Number
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Enter Phone Number</label>
                                                <input type="tel" class="form-control" name="phone_number" placeholder="Enter Phone Number">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Register User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        Send SMS message
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="/custom">
                                            @csrf
                                            <div class="form-group">
                                                <label>Select users to notify</label>
                                                <select name="users[]" multiple class="form-control">
                                                    @foreach ($users as $user)
                                                    <option>{{$user->phone_number}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Notification Message</label>
                                                <textarea name="body" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send Notification</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

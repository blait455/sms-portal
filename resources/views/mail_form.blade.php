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
                                        Add To Mailing List
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('add-mail-list') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Enter email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Register email</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        Send e-mail Message
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('send-email') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Select users to notify</label>
                                                <select name="emails[]" multiple class="form-control">
                                                    @foreach ($emails as $email)
                                                    <option>{{$email->email}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mail title</label>
                                                <input name="subject" placeholder="mail subject" type="text" class="form-control">
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Basic Info</h2>
        <form action="{{ route('basicInfo.update', $basicInfo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" name="company_name" id="company_name" value="{{ $basicInfo->company_name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="{{ $basicInfo->address }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="telephone_number">Telephone Number:</label>
                <input type="text" name="telephone_number" id="telephone_number" value="{{ $basicInfo->telephone_number }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" name="email_address" id="email_address" value="{{ $basicInfo->email_address }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

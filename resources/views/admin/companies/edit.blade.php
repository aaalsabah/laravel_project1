@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="border: 1px solid #f1f1f1;">
          <h2 class="text-center" style="margin-top: 30px;">Update Company Record</h2>
          <form class="form" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data" method="post">
            {{-- {{ csrf_field() }} --}}
            @csrf
            {{-- {{ method_field('put') }} --}}
            @method('PUT')
            
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" value="{{ $company->name }}">
            </div>
            
            {{-- <div class="form-group">
              <strong>Company Name:</strong>
              <input type="text" name="name" value="{{ $company->name }}" class="form-control"
                  placeholder="Company name">
              @error('name')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div> --}}
            
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="{{ $company->email }}">
            </div>

            <div class="form-group">
              <label>Logo</label>
              <input type="file" name="logo" class="form-control" value="{{ $company->logo }}">
            </div>

            <div class="form-group">
              <label>Website</label>
              <input type="url" name="website" class="form-control" value="{{ $company->website }}">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success" name="save_company">Update Company Record</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection

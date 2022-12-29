@extends('layouts.app')

@section('content')
<div class="container">

      {{-- @if ($errors->any())
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif --}}

    <div class="row justify-content-center">
        <div class="col-md-6" style="border: 1px solid #f1f1f1;">
          
          <h2 class="text-center" style="margin-top: 30px;">Add Company Record</h2>
          
          <form class="form" action="{{ route('companies.store') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="form-group <?php echo $errors->has('name') ? 'has-error' : '' ?>">
              <label class="control-label">Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
              @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <div class="form-group <?php echo $errors->has('email') ? 'has-error' : '' ?>">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
              @if($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="form-group <?php echo $errors->has('logo') ? 'has-error' : '' ?>">
              <label>Logo</label>
              <input type="file" name="logo" class="form-control" value="{{ old('logo') }}">
              @if($errors->has('logo'))
                <span class="help-block">{{ $errors->first('logo') }}</span>
              @endif
            </div>

            <div class="form-group <?php echo $errors->has('website') ? 'has-error' : '' ?>">
              <label>Website</label>
              <input type="url" name="website" class="form-control" value="{{ old('website') }}">
              @if($errors->has('website'))
                <span class="help-block">{{ $errors->first('website') }}</span>
              @endif
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="save_company">Save Company Record</button>
            </div>

          </form>

        </div>
    </div>
</div>
@endsection

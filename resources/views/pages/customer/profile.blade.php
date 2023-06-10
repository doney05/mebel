@extends('layouts.customer.app')
@section('title')
    Profile - Customer
@endsection
@section('content')
    <div class="title mb-4">
        <h4 class="m-b-lg"  style="font-weight: 600">Profile</h4>
    </div>
        <div class="row">
            <div class="col-lg-9 col-md-6 col-dm-12">
                <div class="card">
                    <form action="{{ url('update-profile/'. Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h5>Kelola Profil Anda</h5>
                            <hr>
                            @if ($alamat)
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required
                                        value="{{ $user[0]['name'] }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Email</label>
                                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required
                                        value="{{ $user[0]['email'] }}" readonly>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Password</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required
                                        value="{{ $user[0]['password'] }}">
                                        <p style="color: red; font-size: 13px; margin-top: 5px">Jika update profile. Harap isi ulang password!</p>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">No. Telepon</label>
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required
                                        value="{{ $alamat->phone }}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="province">Provinsi</label>
                                        <select name="provinces_id" id="provinces_id" class="form-control" required>
                                            <option value="{{ $alamat->provinces_id }}">{{ $alamat->province->title }}</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="city">Kota</label>
                                        <select name="cities_id" id="cities_id" class="form-control" required>
                                            <option value="{{ $alamat->cities_id }}">{{ $alamat->city->title }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ $alamat->alamat }}</textarea>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required
                                        value="{{ $user[0]['name'] }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Email</label>
                                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required
                                        value="{{ $user[0]['email'] }}" readonly>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Password</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required
                                        value="{{ $user[0]['password'] }}">
                                        <p style="color: red; font-size: 13px; margin-top: 5px">Jika update profile. Harap isi ulang password!</p>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">No. Telepon</label>
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="province">Provinsi</label>
                                        <select name="provinces_id" id="provinces_id" class="form-control" required>
                                            <option>Pilih Provinsi</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="city">Kota</label>
                                        <select name="cities_id" id="cities_id" class="form-control" required>
                                            <option>Pilih Kota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@push('script')
<script>
      $('#provinces_id').on('change', function(){
                let provinceId = $(this).val()
                if (provinceId) {
                    // console.log(provinceId);
                    jQuery.ajax({
                        url: '/getcity/'+provinceId,
                        type: 'GET',
                        data: 'json',
                        success:function(data){
                            $('#cities_id').empty();
                            $('#cities_id').append('<option>Pilih Kota </option>');
                            $.each(JSON.parse(data), function(key, title){
                                $('#cities_id').append('<option value="' + key + '">' + title + '</option>');
                            });
                        }
                    });
                }else{
                    $('#cities_id').empty();
                }
                // console.log(provinceId);
        })
</script>

@endpush

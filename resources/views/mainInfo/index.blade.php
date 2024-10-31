@extends('layouts.admin')

@section('main-content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    
                        <div class="">
                            <div class="p-5">
                                <div class="text-center">
                                    @if ($hasExistingData)
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('تحديث معلومات الشخصية') }}</h1>
                                    @else
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('معلومات الشخصية') }}</h1>
                                    @endif
                                </div>
                                    {{-- validation --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger border-left-danger" role="alert">
                                            <ul class="pl-4 my-2">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif  
                                            
                                        {{-- forms --}}
                                        @if ($hasExistingData)
                                            @foreach ($maininfos as $info)

                                                {{-- update form --}}
                                                
                                                <form method="POST" action="/mainInfo/{{$info->id}}"  enctype="multipart/form-data">
                                                @method("PATCH")
                                                @csrf
                                                <div class="row justify-content-center">
                                                    <div class="text-center mb-4 pr-5" style="position: relative">
                                                        <img width="82px" height="82px" src="{{$info->image}}">
                                                        <label for="image" >
                                                            <i class="fas fa-edit fa-2x" style="color: #a8abb3;position: absolute;top: 65%;left: -15%; cursor: pointer;"></i>
                                                        </label>
                                                        <input type="file" id="image" class="form-control form-control-user" name="image" style="display:none;">
                                                    </div>
                                                    <div class="text-center mb-4 " style="position: relative">
                                                        <a href="{{$info->cv}}" target="_blank"=""><img src="{{ asset('assets/admin/img/cv.png') }}" alt=""> </a>
                                                        <label for="cv" >
                                                            <i class="fas fa-edit fa-2x" style="color: #eb7190;position: absolute;top: 65%;left: -23%; cursor: pointer;"></i>
                                                        </label>
                                                        <input type="file" id="cv" class="form-control form-control-user" name="cv" style="display:none;">
                                                    </div>
                                                </div>
                                                
                                            @endforeach
                                            @include('mainInfo.form')
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    {{ __('حفظ') }}
                                                </button>
                                            </div>

                                        @else
                                        
                                            {{-- update form --}}
                                            <form method="POST" action="/mainInfo"  enctype="multipart/form-data">
                                                @csrf
                                                @include('mainInfo.form')
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label for="cv" class="form-control-label">سيرة الذاتية</label>
                                                            <input type="file" class="form-control " name="cv"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label for="image" class="form-control-label"> الصورة الشخصية</label>
                                                            <input type="file" id="image" class="form-control" name="image"  >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                            {{ __('ارسال') }}
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </form>

                                        @endif
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    

   
</div>

@endsection

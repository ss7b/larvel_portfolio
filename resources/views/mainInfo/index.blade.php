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
                                                <div class="text-center mb-4" style="position: relative; width: fit-content; left: 44%;">
                                                    <img width="82px" height="82px" src="{{$info->image}}">
                                                    <label for="image" >
                                                        <i class="fas fa-edit fa-2x" style="color: #a8abb3; position: absolute; top:25%; left:34%;"></i>
                                                    </label>
                                                    <input type="file" id="image" class="form-control form-control-user" name="image" style="display:none;">
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
                                                <div class="form-group ">
                                                    <input type="file" class="form-control form-control-user" name="image"  >
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        {{ __('ارسال') }}
                                                    </button>
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

@extends('layouts.admin')

@section('main-content')
<div class="container">    
    <div class="row justify-content-center ">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header py-3">        
                    
                    <h1 class="h4 text-gray-900 py-2 text-center" >{{ __('خدماتي') }}</h1>
                    <hr>
                           
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
                               
                    {{-- form --}}
                        <form method="POST" action="/services">
                            @csrf
                            <div class="row" dir="rtl">
                                <div class="form-group col-6">
                                    <input type="text" class="form-control form-control-user " name="title" placeholder="{{ __('الخدمة') }}"    required >
                                </div>
                                <div class="form-group col-6">
                                    <label for="icon">ايقونة</label>
                                    <select name="icon" id="icon"required>
                                        <option value="fas fa-address-card"><i class="fas fa-address-card">ss</i></option>
                                        <option value="fas fa-phone"><i class="fas fa-phone"></i>dd</option>
                                        <option value="fas fa-php"><i class="fas fa-php"></i>ff</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('اضافة') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                            
                </div>
                <div class="card-body p-0"> 
                    <div class="container"> 
                        <div class="row">     
                        @foreach ($services as $service)

                            <div class="col-4 my-3">
                                <div class="card border-left-primary shadow h-100 py-2 hover">

                                    <div class="card-body">
                                    <input type="hidden" class="id"  value="{{$service->id}}">

                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="{{$service->icon}} icon"></i></div>
                                                <div class="h5text-xs font-weight-bold text-primary text-uppercase mb-1 title">{{$service->title}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="row">
                                                    <div class="col-4 mx-1 editButton"><i class="fas fa-edit fa-2x" style="color: #4e73df"></i></div>
                                                        <div class="col-4 mx-1 ">
                                                            <form action="/services/{{$service->id}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            
                                                                <button type="submit" class="btn btn-danger">
                                                                    حذف
                                                                </button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll(".editButton");

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // تأكد من أن العنصر موجود قبل الوصول إلى خصائصه
                const card = button.closest('.card');
                if (!card) {
                    console.error('Card element not found');
                    return;
                }

                const cardBody = card.querySelector('.card-body');
                const icon = cardBody.querySelector('.icon').class;
                const id = cardBody.querySelector('.id').value; // تأكد من وجود هذا العنصر
                const title = cardBody.querySelector('.title').textContent;
                
                cardBody.innerHTML = '';
                    
                    cardBody.innerHTML = `
                        
                        <form action="/skills/${id}" method="POST" >
                            @method('PATCH')
                            @csrf
                            <input type="text" name="skill" value="${icon}">
                            <input type="text" name="percent" value="${title}">
                            <button type="submit">حفظ</button>
                        </form>
                    `;
            });
        });
    });
</script>

@endsection

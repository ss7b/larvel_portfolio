
 @extends('layouts.admin')

@section('main-content')
<div class="container">    
    <div class="row justify-content-center ">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header py-3">        
                    
                    <h1 class="h4 text-gray-900 py-2 text-center" >{{ __('اضافة مشريعي') }}</h1>
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
                        <form method="POST" action="/portfolios" enctype="multipart/form-data">
                            @csrf
                            <div class="row" dir="rtl">
                                <div class="form-group col-6">
                                    <input type="text" class="form-control form-control-user " name="link" placeholder="{{ __('رابط المشروع') }}"    required >
                                </div>
                                <div class="form-group col-4">
                                    <input type="file" class="form-control form-control-user" name="image" placeholder="{{ __(' صورة المشروع') }}" >
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
                        @foreach ($portfolios as $portfolio)

                            <div class="col-4 my-3">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <img src="{{$portfolio->image}}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" class="id" value="{{$portfolio->id}}">
                                        <a href="{{$portfolio->link}}" class="link">رابط المشروع</a>
                                        <div class="card-footer row">
                                            <div class="col-6  editbtn"><i class="fas fa-edit fa-2x" style="color: #4e73df"></i></div>
                                            <div class="col-6 ">
                                                <form action="/portfolios/{{$portfolio->id}}" method="POST">
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
        const buttons = document.querySelectorAll(".editbtn");

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // تأكد من أن العنصر موجود قبل الوصول إلى خصائصه
                const card = button.closest('.card');
                if (!card) {
                    console.error('Card element not found');
                    return;
                }

                // const cardBody = card.querySelector('.custome-card');
                
                const image = card.querySelector('.card-img-top').src;
                const link = card.querySelector('.link').href;
                
                const id = card.querySelector('.id').value; // تأكد من وجود هذا العنصر
                
                
                
                card.innerHTML = '';
                card.innerHTML = `
                    <form action="/portfolios/${id}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="card-header py-3" style="position: relative" >
                            <img src="${image}" class="card-img-top" alt="...">
                            <label for="image" >
                                <i class="fas fa-edit fa-5x" style="color: #a8abb3; position: absolute; top:25%; left:34%;"></i>
                            </label>
                            <input type="file" id="image" class="form-control form-control-user" name="image" style="display:none;">
                        </div>
                        <div class="card-body">
                            <div class="form-group col">
                                <label for="link" class="form-label">الرابط<label>
                                <input type="text" id="link" class="form-control form-control-user " name="link" value="${link}" required >
                            </div>
                            <div class="card-footer row">
                                <div class="form-group col">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('حفظ') }}
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    `;
            });
        });
    });
</script>

@endsection

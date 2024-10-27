
        
    <div class="row justify-content-center ">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header py-3">        
    
                    <h1 class="h4 text-gray-900 py-2 text-center" >{{ __('التعليم') }}</h1>
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
                        <form method="POST" action="/educations" enctype="multipart/form-data">
                            @csrf
                            <div class="row" dir="rtl">
                                <div class="form-group col-6">
                                    <input type="text" class="form-control form-control-user " name="title" placeholder="{{ __('التخصص') }}"    required >
                                </div>
                                <div class="form-group col-6">
                                    <input type="text" class="form-control form-control-user " name="provider" placeholder="{{ __('مكان حصول الشهادة') }}"    required >
                                </div>
                                <div class="form-group col-4">
                                    <input type="text" class="form-control form-control-user" name="from" placeholder="{{ __('بداية التاريخ') }}"  required>
                                </div>
                                <div class="form-group col-4">
                                    <input type="text" class="form-control form-control-user" name="to" placeholder="{{ __('نهاية التاريخ') }}"  required>
                                </div>
                                <div class="form-group col-4">
                                    <input type="file" class="form-control form-control-user" name="graduation" placeholder="{{ __('صورة الشهادة') }}" >
                                </div>
                                <div class="form-group col">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('اضافة') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        {{-- card container --}}
                
                <div class="card-body p-0"> 
                    <div class="container"> 
                        @foreach ($educations as $education)
                        <div class="row">
                            <div class="col-4 my-3">
                                <div class="card shadow mb-4">
                                    <div class="custom-card">
                                        <div class="card-header py-3">
                                            <img src="{{$education->graduation}}" class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" class="id" value="{{$education->id}}">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 ">
                                                <span class="fromVal">{{$education->from}}</span> - 
                                                <span class="toVal">{{$education->to}}</span>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 title">{{$education->title}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 provider">{{$education->provider}}</div>
                                            <p class="card-text"></p>
                                            <div class="card-footer row">
                                                <div class="col-6  edit_btn"><i class="fas fa-edit fa-2x" style="color: #4e73df"></i></div>
                                                <div class="col-6 ">
                                                    <form action="/educations/{{$education->id}}" method="POST">
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
            const buttons = document.querySelectorAll(".edit_btn");
    
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // تأكد من أن العنصر موجود قبل الوصول إلى خصائصه
                    const card = button.closest('.card');
                    if (!card) {
                        console.error('Card element not found');
                        return;
                    }
    
                    const cardBody = card.querySelector('.custom-card');
                    const image = cardBody.querySelector('.card-img-top').src;
                    const fromVal = cardBody.querySelector('.fromVal').textContent;
                    const toVal = cardBody.querySelector('.toVal').textContent;
                    const title = cardBody.querySelector('.title').textContent;
                    const provider = cardBody.querySelector('.provider').textContent;
                    const id = cardBody.querySelector('.id').value; // تأكد من وجود هذا العنصر
                    const skillPercentage = cardBody.querySelector('.h5').textContent;
                    
                    cardBody.innerHTML = '';
                        
                    cardBody.innerHTML = `
                        <form action="/educations/${id}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="card-header py-3" style="position: relative" >
                                <img src="${image}" class="card-img-top" alt="...">
                                <label for="image" >
                                    <i class="fas fa-edit fa-5x" style="color: #a8abb3; position: absolute; top:25%; left:34%;"></i>
                                </label>
                                <input type="file" id="image" class="form-control form-control-user" name="graduation" style="display:none;">
                            </div>
                            <div class="card-body">
                                
                                <div class="form-group col">
                                    <input type="text" class="form-control form-control-user " name="title" value="${title}" placeholder="{{ __('التخصص') }}" required >
                                </div>
                                <div class="form-group col">
                                    <input type="text" class="form-control form-control-user " name="provider" value="${provider}" placeholder="{{ __('مكان حصول الشهادة') }}" required >
                                </div>
                                <div class="form-group col">
                                    <input type="text" class="form-control form-control-user" name="from" value="${fromVal}"  placeholder="{{ __('بداية التاريخ') }}" required>
                                </div>
                                <div class="form-group col">
                                    <input type="text" class="form-control form-control-user" name="to" value="${toVal}" placeholder="{{ __('نهاية التاريخ') }}" required>
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

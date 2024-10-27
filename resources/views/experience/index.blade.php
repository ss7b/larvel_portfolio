
        
    <div class="row justify-content-center ">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header py-3">        
                    
                    <h1 class="h4 text-gray-900 py-2 text-center" >{{ __('الخبرات') }}</h1>
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
                            
                        {{-- forms --}}
                        
                            {{-- update form --}}
                            <form method="POST" action="/experience" >
                                @csrf
                                @include('experience.expForm')
                            </div>
                            <div class="card-body p-0">                 
                            <div class="">
                            
                            
                            <hr>
                            <div class="container">      
                                @foreach ($experiences as $experience)
                                <div class="card border-left-success shadow h-100 py-2 my-3">
                                    <div class="card-body">
                                        <input type="hidden" class="id" value="{{$experience->id}}">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 ">
                                                    <span class="fromVal">{{$experience->from}}</span> - 
                                                    <span class="toVal">{{$experience->to}}</span>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800 title">{{$experience->title}}</div>
                                            </div>
                                            <div class="col-2 actions ">
                                                <div class="row">
                                                    <div class="col-4 mx-1 editbtn"><i class="fas fa-edit fa-2x" style="color: #4e73df"></i></div>
                                                        <div class="col-4 mx-1 ">
                                                            <form action="/experience/{{$experience->id}}" method="POST">
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
    
                    const cardBody = card.querySelector('.card-body');
                    const fromVal = cardBody.querySelector('.fromVal').textContent;
                    const toVal = cardBody.querySelector('.toVal').textContent;
                    const title = cardBody.querySelector('.title').textContent;
                    const id = cardBody.querySelector('.id').value; // تأكد من وجود هذا العنصر
                    const skillPercentage = cardBody.querySelector('.h5').textContent;
                    
                    cardBody.innerHTML = '';
                        
                    cardBody.innerHTML = `
                            <form action="/experience/${id}" method="POST" >
                                @method('PATCH')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-3">
                                        <input type="text" class="form-control form-control-user" name="title" value="${title}" required>
                                    </div>
                                    <div class="form-group col-3">
                                        <input input type="text" class="form-control form-control-user" name="from" value="${fromVal}" required>
                                    </div>
                                    <div class="form-group col-3">
                                        <input type="text" class="form-control form-control-user" name="to" value="${toVal}" required>
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">حفظ</button>
                                    </div>
                                 </div>
                            </form>
                        `;
                });
            });
        });
    </script>


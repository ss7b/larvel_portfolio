<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-header py-3">        
                
                <h1 class="h4 text-gray-900 py-2 text-center" >{{ __('المهارات') }}</h1>
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
                        <form method="POST" action="/skills" >
                            @csrf
                                @include('skills.skillsForm')
                        </div>
                        <div class="card-body p-0">                 
                        <div class="">
                        
                        
                        <hr>
                        <div class="container">      
                            @forelse ($skills as $skill)                          
                            <div class=" mb-4 hover" >
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body" >
                                        <input type="hidden" class="id"  value="{{$skill->id}}">
                                        <div class="row no-gutters align-items-center" >
                                            <div class="col-10 pr-5" >
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{$skill->skill}}</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$skill->percent}}%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar" style="width:{{$skill->percent}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 actions ">
                                                <div class="row">
                                                    <div class="col-4 mx-1 editButton"><i class="fas fa-edit fa-2x" style="color: #4e73df"></i></div>
                                                        <div class="col-4 mx-1 ">
                                                            <form action="/skills/{{$skill->id}}" method="POST">
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
                            @empty
                                <h4>لا توجد مهارات</h4>  
                            @endforelse
                            
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
                const skillName = cardBody.querySelector('.text-xs').textContent;
                const id = cardBody.querySelector('.id').value; // تأكد من وجود هذا العنصر
                const skillPercentage = cardBody.querySelector('.h5').textContent;
                
                cardBody.innerHTML = '';
                    
                    cardBody.innerHTML = `
                        
                        <form action="/skills/${id}" method="POST" >
                            @method('PATCH')
                            @csrf
                            <input type="text" name="skill" value="${skillName}">
                            <input type="text" name="percent" value="${skillPercentage.slice(0, -1)}">
                            <button type="submit">حفظ</button>
                        </form>
                    `;
            });
        });
    });
</script>
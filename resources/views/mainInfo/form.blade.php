

    <div class="row">
        {{-- اسم الاول --}}
        <div class="col-lg-6">
            <div class="form-group focused">
                <label class="form-control-label" for="firstName">الاسم الاول</label>
                <input type="text" id="firstName" class="form-control" name="firstName" placeholder="{{ __('الاسم الاول') }}" value="{{$info->firstName ?? ''}}" >
            </div>
        </div>
        {{-- اسم الاول --}}
        <div class="col-lg-6">
            <div class="form-group focused">
                <label class="form-control-label" for="lastName">اسم العائلة</label>
                <input type="text" id="lastName" class="form-control" name="lastName" placeholder="{{ __('اسم العائلة ') }}" value="{{$info->lastName ?? ''}}" >
            </div>
        </div>
        {{--  provider --}}
        <div class="col-lg-6">
            <div class="form-group focused">
                <label class="form-control-label" for="provider">التخصص</label>
                <input type="text" id="provider" class="form-control" name="provider" placeholder="{{ __(' التخصص ') }}" value="{{$info->provider ?? ''}}" >
            </div>
        </div>
        {{--  birthday --}}
        <div class="col-lg-6">
            <div class="form-group focused">
                <label class="form-control-label" for="birthday">تاريخ الميلاد</label>
                <input type="date" id="birthday" class="form-control" name="birthday"  value="{{$info->birthday ?? ''}}" >
            </div>
        </div>
        {{--  contact_number --}}
        <div class="col-lg-6">
            <div class="form-group focused">
                <label class="form-control-label" for="contact_number">رقم التواصل</label>
                <input type="text" id="contact_number" class="form-control" name="contact_number" placeholder="{{ __(' رقم التواصل ') }}" value="{{$info->contact_number ?? ''}}" >
            </div>
        </div>
        {{-- email --}}
        <div class="col-lg-6">
            <div class="form-group focused">
                <label class="form-control-label" for="email"> بريد الالكتروني التواصل</label>
                <input type="text" id="email" class="form-control" name="email" placeholder="{{ __('  بريد الالكتروني التواصل ') }}" value="{{$info->email ?? ''}}" >
            </div>
        </div>
        {{-- location --}}
        <div class="col-lg-6">
            <div class="form-group focused">
                <label class="form-control-label" for="location"> المدينة</label>
                <input type="text" id="location" class="form-control" name="location" placeholder="{{ __(' المدينة') }}" value="{{$info->location ?? ''}}" >
            </div>
        </div>
        {{-- description --}}
        <div class="col-12">
            <div class="form-group focused">
                <label class="form-control-label" for="description">الوصف</label>
                <textarea class="form-control form-control-user" id="description" name="description" placeholder="{{ __('اوصف نفسك ') }}" required>{{$info->description ?? ''}}</textarea>
        </div>

    </div>

    <div class="form-group">
    </div>

    



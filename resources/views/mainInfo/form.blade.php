

    <div class="row">
        <div class="form-group col-6">
            <input type="text" class="form-control form-control-user " value="{{$info->firstName ?? ''}}" name="firstName" placeholder="{{ __('الاسم الاول') }}"  required fuces>
        </div>

        <div class="form-group col-6">
            <input type="text" class="form-control form-control-user" name="lastName" placeholder="{{ __('اسم العائلة') }}" value="{{$info->lastName ?? ''}}" required>
        </div>
    </div>

    <div class="form-group">
        <textarea class="form-control form-control-user" name="description" placeholder="{{ __('اوصف نفسك ') }}" required>{{$info->description ?? ''}}</textarea>
    </div>

    



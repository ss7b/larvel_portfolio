
<div class="row" dir="rtl">
    <div class="form-group col-4">
        <input type="text" class="form-control form-control-user " name="title" placeholder="{{ __('التخصص') }}"    required >
    </div>

    <div class="form-group col-3">
        <input type="text" class="form-control form-control-user" name="from" placeholder="{{ __('بداية التاريخ') }}"  required>
    </div>
    <div class="form-group col-3">
        <input type="text" class="form-control form-control-user" name="to" placeholder="{{ __('نهاية التاريخ') }}"  required>
    </div>

    <div class="form-group col-2">
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('اضافة') }}
        </button>
    </div>
</form>
</div>



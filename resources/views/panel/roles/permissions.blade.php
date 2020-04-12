
<div class="form-group">
    <h5>مجموعات الصلاحيات</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['add_roles'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="add_roles" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_roles')) checked @endif>  إضافة / تعديل
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <h5>المديرين</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['show_admins' , 'add_admins'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="show_admins" type="checkbox" @if(isset($item) && $item->hasPermissionTo('show_admins')) checked @endif> عرض
                    <span></span>
                </label>
            </div>
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="add_admins" type="checkbox" @if(isset($item) && $item->hasPermissionTo('add_admins')) checked @endif>  إضافة / تعديل
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <h5>الأسئلة الشائعة</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['manage_faqs'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_faqs" type="checkbox" @if(isset($item) && $item->hasPermissionTo('manage_faqs')) checked @endif> ادارة الأسئلة الشائعة
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>
<div class="form-group">
    <h5>القوائم</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['manage_items'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_items" type="checkbox" @if(isset($item) && $item->hasPermissionTo('manage_items')) checked @endif> ادارة القوائم
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>


{{--<div class="form-group">--}}
{{--    <h5> صفحات الموقع </h5>--}}
{{--    <fieldset>--}}
{{--        <legend>--}}
{{--            <label class="kt-checkbox">--}}
{{--                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['manage_pages'])) checked @endif>--}}
{{--                <span class="first"></span>--}}
{{--            </label>--}}
{{--        </legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mb-4">--}}
{{--                <label class="kt-checkbox">--}}
{{--                    <input name="permissions[]" value="manage_pages" type="checkbox"--}}
{{--                           @if(isset($item) && $item->hasPermissionTo('manage_pages')) checked @endif>  ادارة الصفحات--}}
{{--                    <span></span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}


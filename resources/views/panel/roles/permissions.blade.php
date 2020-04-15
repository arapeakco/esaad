
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
    <h5>الانواع</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['manage_post_type'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_post_type" type="checkbox" @if(isset($item) && $item->hasPermissionTo('manage_post_type')) checked @endif> ادارة الانواع
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


<div class="form-group">
    <h5>الحركات المالية</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['manage_transactions'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_transactions" type="checkbox" @if(isset($item) && $item->hasPermissionTo('manage_transactions')) checked @endif> ادارة الحركات المالية
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>


<div class="form-group">
    <h5> التحكم بالموقع </h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['manage_about' , 'manage_members' , 'manage_expenses' , 'manage_famous' , 'manage_rec'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_about" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('manage_about')) checked @endif>  ادارة عن الحملة
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_slider" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('manage_slider')) checked @endif>  ادارة السلايدر
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_members" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('manage_members')) checked @endif>  ادارة العضويات
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_expenses" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('manage_expenses')) checked @endif>  ادارة المصارف
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_famous" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('manage_famous')) checked @endif>  ادارة المشاهير
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" value="manage_rec" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('manage_rec')) checked @endif>  ادارة التوصيات
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('first_name'), 'has-success': fields.first_name && fields.first_name.valid }">
    <label for="first_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.first_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.first_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('first_name'), 'form-control-success': fields.first_name && fields.first_name.valid}" id="first_name" name="first_name" placeholder="{{ trans('admin.student.columns.first_name') }}">
        <div v-if="errors.has('first_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('first_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
    <label for="last_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.last_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.last_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': fields.last_name && fields.last_name.valid}" id="last_name" name="last_name" placeholder="{{ trans('admin.student.columns.last_name') }}">
        <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nfc'), 'has-success': fields.nfc && fields.nfc.valid }">
    <label for="nfc" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.nfc') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nfc" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nfc'), 'form-control-success': fields.nfc && fields.nfc.valid}" id="nfc" name="nfc" placeholder="{{ trans('admin.student.columns.nfc') }}">
        <div v-if="errors.has('nfc')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nfc') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('parent_phone_number'), 'has-success': fields.parent_phone_number && fields.parent_phone_number.valid }">
    <label for="parent_phone_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.parent_phone_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.parent_phone_number" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('parent_phone_number'), 'form-control-success': fields.parent_phone_number && fields.parent_phone_number.valid}" id="parent_phone_number" name="parent_phone_number" placeholder="{{ trans('admin.student.columns.parent_phone_number') }}">
        <div v-if="errors.has('parent_phone_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('parent_phone_number') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_active'), 'has-success': fields.is_active && fields.is_active.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_active" type="checkbox" v-model="form.is_active" v-validate="''" data-vv-name="is_active"  name="is_active_fake_element">
        <label class="form-check-label" for="is_active">
            {{ trans('admin.student.columns.is_active') }}
        </label>
        <input type="hidden" name="is_active" :value="form.is_active">
        <div v-if="errors.has('is_active')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_active') }}</div>
    </div>
</div>



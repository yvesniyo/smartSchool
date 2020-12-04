<div class="form-group row" :class="{'has-danger': errors.has('student_id'), 'has-success': this.fields.student_id && this.fields.student_id.valid }">
    <label for="student_id" class="col-form-label text-center col-md-3 col-lg-3">
        {{ trans('admin.attendancy.columns.student_id') }}
    </label>
    <div class="col-md-8 col-lg-9">

        <multiselect v-model="form.student" :options="students" :multiple="false" track-by="id" label="full_name" tag-placeholder="{{ __('Select Student') }}" placeholder="{{ __('Student') }}">
        </multiselect>

        <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('student_id') }}
        </div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('notified'), 'has-success': fields.notified && fields.notified.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="notified" type="checkbox" v-model="form.notified" v-validate="''" data-vv-name="notified" name="notified_fake_element">
        <label class="form-check-label" for="notified">
            {{ trans('admin.attendancy.columns.notified') }}
        </label>
        <input type="hidden" name="notified" :value="form.notified">
        <div v-if="errors.has('notified')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('notified') }}</div>
    </div>
</div>

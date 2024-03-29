@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.school.actions.edit', ['name' => $school->name]))

@section('body')

<div class="container-xl">
    <div class="card shadow-sm border-0">

        <school-form :action="'{{ $school->resource_url }}'" :data="{{ $school->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.school.actions.edit', ['name' => $school->name]) }}
                </div>

                <div class="card-body">
                    @include('admin.school.components.form-elements')
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </school-form>

    </div>

</div>

@endsection

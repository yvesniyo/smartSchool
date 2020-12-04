@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.attendancy.actions.edit', ['name' => $attendancy->id]))

@section('body')

<div class="container-xl">
    <div class="card">

        <attendancy-form :students="{{$students->toJson()}}" :action="'{{ $attendancy->resource_url }}'" :data="{{ $attendancy->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.attendancy.actions.edit', ['name' => $attendancy->id]) }}
                </div>

                <div class="card-body">
                    @include('admin.attendancy.components.form-elements')
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </attendancy-form>

    </div>

</div>

@endsection

<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Permissions') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{ __('Update permission') }}
    </x-slot>

    <x-slot name="href">
        {{ __(route('permission.index')) }}
    </x-slot>

    <div>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('permission.update', $permission->id) }}">
        @csrf
        @method('PUT')

            <div class="py-2">
            <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

            <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                type="text"
                                name="name"
                                value="{{ old('name', $permission->name) }}"
                                />
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>

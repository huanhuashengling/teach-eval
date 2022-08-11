<x-admin.wrapper>
    <x-slot name="title">
            {{ __('日志列表') }}
    </x-slot>
    <div>
        <x-admin.breadcrumb href="{{route('task_log.index')}}" title="{{ __('创建日志') }}">{{ __('<< 回到日志列表') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('task_log.store') }}">
        @csrf
            <div class="py-2">
                <livewire:selector :dataset="$tasks" :selectTasksId="$selectTasksId" />
                <livewire:participator />
            </div>
        </form>
    </div>
</x-admin.wrapper>

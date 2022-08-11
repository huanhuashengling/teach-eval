<x-admin.wrapper>
    <x-slot name="title">
            {{ __('任务列表') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('task_log.index')}}" title="{{ __('更新日志') }}">{{ __('<< 回到日志列表') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="">
        @csrf
        @method('PUT')

        <livewire:selector :dataset="$tasks" :selectTasksId="$selectTasksId" />
        <livewire:participator/>
        </form>
    </div>
</x-admin.wrapper>

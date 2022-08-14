<x-admin.wrapper>
    <x-slot name="title">
        {{ __('任务记录') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{ __('修改记录') }}
    </x-slot>

    <x-slot name="href">
        {{ __(route('task_log.index')) }}
    </x-slot>

    <div>
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
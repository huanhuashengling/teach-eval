<x-admin.wrapper>
    <x-slot name="title">
        {{ __('任务列表') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{ __('') }}
    </x-slot>

    <x-slot name="href">
        {{ __(route('task.index')) }}
    </x-slot>
    <div class="">
        <div class="inline-block">
            @can('task create')
            <x-admin.add-link href="{{ route('task.create') }}">
                {{ __('添加任务') }}
            </x-admin.add-link>
            @endcan
        </div>
        <div class="inline-block">
            <x-admin.grid.search action="{{ route('task.index') }}" />
        </div>
    </div>

    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => '内容', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => '类型', 'attribute' => 'task_types_id'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => '人员', 'attribute' => 'participant_types_id'])
                        </x-admin.grid.th>
                        <!-- <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => '完成情况(总｜完｜未)', 'attribute' => 'participant_types_id'])
                        </x-admin.grid.th> -->
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => '时间', 'attribute' => 'happen_at'])
                        </x-admin.grid.th>
                        @canany(['task edit', 'task delete'])
                        <x-admin.grid.th>
                            {{ __('操作') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($tasks as $task)
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('task.show', $task->id)}}" class="no-underline hover:underline text-cyan-600 dark:text-cyan-400">{{ $task->name }}</a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $task->taskType->name }}
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $task->participantType->name }}
                            </div>
                        </x-admin.grid.td>
                        <!-- <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $task->task_logs_count }} | {{ $task->task_logs_counta }} | {{ $task->task_logs_countb }}
                            </div>
                        </x-admin.grid.td> -->
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $task->happen_at }}
                            </div>
                        </x-admin.grid.td>
                        @canany(['task edit', 'task delete'])
                        <x-admin.grid.td>
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                <div class="flex">
                                    @can('task edit')
                                    <a href="{{route('task.edit', $task->id)}}" class="inline-flex items-center px-4 py-2 mr-4 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('编辑') }}
                                    </a>
                                    @endcan

                                    @can('task delete')
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                        {{ __('删除') }}
                                    </button>
                                    @endcan
                                </div>
                            </form>
                        </x-admin.grid.td>
                        @endcanany
                    </tr>
                    @endforeach
                </x-slot>
            </x-admin.grid.table>
        </div>
        <div class="py-8">
            {{ $tasks->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>

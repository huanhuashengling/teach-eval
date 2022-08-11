<x-admin.wrapper>
    <x-slot name="title">
            {{ __('任务列表') }}
    </x-slot>

    <div class="d-print-none with-border">
        <x-admin.breadcrumb href="{{route('task.index')}}" title="{{ __('查看任务内容') }}">{{ __('<< 回到任务列表') }}</x-admin.breadcrumb> 
    </div>
    <div class="w-full py-2">
        <div class="min-w-full border-b border-gray-200 shadow">
            <table class="table-fixed w-full text-sm">
                <tbody class="bg-white dark:bg-slate-800">
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('内容') }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{$task->name}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('任务类型') }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{$task->participant_types_id}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('日期') }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{$task->happen_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin.wrapper>

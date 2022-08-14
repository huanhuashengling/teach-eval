<x-admin.wrapper>
    <x-slot name="title">
        {{ __('任务记录') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{ __('') }}
    </x-slot>

    <x-slot name="href">
        {{ __(route('task_log.index')) }}
    </x-slot>
    <div class="">
      <div class="inline-block">
            @can('task_log create')
            <x-admin.add-link href="{{ route('task_log.create') }}">
                {{ __('添加记录') }}
            </x-admin.add-link>
            @endcan
      </div>
      <div class="inline-block">
            <x-admin.grid.search action="{{ route('task_log.index') }}" />
      </div>
    </div>

    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">

                <div id="accordion-collapse" data-accordion="collapse">
                @foreach($tasks as $key=>$task)

                  <h2 id="accordion-collapse-heading-{{ $task->id }}">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white" data-accordion-target="#accordion-collapse-body-{{ $task->id }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $task->id }}">
                      <span>{{$key+1}}. {{ $task->name }} ({{ $task->happen_at }}).</span>

                      <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </h2>
                  <div id="accordion-collapse-body-{{ $task->id }}" class="" aria-labelledby="accordion-collapse-heading-{{ $task->id }}">
                    <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <div class="grid grid-cols-3 sm:grid-cols-3 gap-1 md:grid-cols-8 lg:grid-cols-10">
                        @foreach ($task->taskLogs as $taskLog)
                            @if("1" == $taskLog->eval)
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ $taskLog->user->name }}</button>
                            @else
                            <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{ $taskLog->user->name }}</button>
                            @endif
                        @endforeach
                    </div>
                    @if(isset($task->taskLogs[0]))
                    <button type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    
                        <a href="{{ route('task_log.edit', $task->taskLogs[0]->id) }}">更新名单</a></button>
                    @endif
                  </div>
                  </div>
                @endforeach
            </div>
        </div>
        <div class="py-8">
            {{ $tasks->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>

<!-- Just used for report page-->
<x-app-layout>
    <x-slot name="header">
    	<form method="GET" action="{{ route('report.index') }}" class="gap-20">
    		<div date-rangepicker="" class="flex items-center">
      		<div class="relative">
        		<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            	<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        		</div>
        		<input type="text" name="startDate" value="{{$startDate}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="选择开始日期">
      		</div>
      		<span class="mx-4 text-gray-500">至</span>
      		<div class="relative">
        		<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            	<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        	</div>
        	<input type="text" name="endDate" value="{{$endDate}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="选择结束日期">
    	</div>
    </div>

	<div class="grid gap-4 grid-cols-5">
		<div>
			<div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
			    <input id="bordered-radio-1" type="radio" value="1" name="participantTypesId" {{ ($participantTypesId == '1')? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
	    		<label for="bordered-radio-1" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $title1 }}</label>
			</div>
		</div>
		<div>
			<div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
			    <input id="bordered-radio-2" type="radio" value="2" name="participantTypesId" {{ ($participantTypesId == '2')? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
			    <label for="bordered-radio-2" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $title2 }}</label>
			</div>
			
		</div>
		<div>
			<button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">查询</button>
		</div>

		<div>
			<a href="{{ route('operator.report.export') }}?ptId={{ $participantTypesId }}&startDate={{$startDate}}&endDate={{$endDate}}"><button type="button" class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">表格导出</button></a>
		</div>
	</div>
</form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-admin.message />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

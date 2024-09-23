<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="flex justify-between mb-4">
                        <div>
                            <a href="{{ route('transactions.index') }}">
                                <x-primary-button>
                                    Home
                                </x-primary-button>
                            </a>
                            <a href="{{ route('transaction.report') }}">
                                <x-primary-button>
                                    Report
                                </x-primary-button>
                            </a>
                        </div>


                        <form action="{{ route('transaction.report') }}" class="flex items-center gap-2" method="GET">
                            <div class="flex items-center gap-2">
                                <x-input-label for="from" :value="__('From')" />
                                <x-text-input id="from" class="" type="date" name="from"
                                    :value="$from" />
                            </div>
                            <div class="flex items-center gap-2">
                                <x-input-label for="to" :value="__('To')" />
                                <x-text-input id="to" class="" type="date" name="to"
                                    :value="$to" />
                            </div>
                            <x-secondary-button type="submit">Filter</x-secondary-button>
                        </form>
                    </div>
                    <div class="overflow-x-auto">
                        <div class="flex gap-8">
                            <div class="w-full border-r">
                                <h1 class="font-bold my-2">Incomes</h1>
                                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                                    <thead class="ltr:text-left rtl:text-right">
                                        <tr>
                                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Spend Date
                                            </th>
                                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Amount
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($transaction['incomes'] as $service)
                                            <tr>
                                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                                    {{ $service->name }}</td>

                                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                    {{ $service->spend_date }}
                                                </td>
                                                <td class="text-right px-4 py-2 text-gray-700">
                                                    {{ $service->amount }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="w-full border-l">
                                <h1 class="font-bold my-2">Expenses</h1>
                                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                                    <thead class="ltr:text-left rtl:text-right">
                                        <tr>
                                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Spend Date
                                            </th>
                                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Amount
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($transaction['expenses'] as $service)
                                            <tr>
                                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                                    {{ $service->name }}</td>

                                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                    {{ $service->spend_date }}
                                                </td>
                                                <td class="text-right px-4 py-2 text-gray-700">
                                                    {{ $service->amount }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="flex gap-8 border-t">
                            <div class="w-full flex mx-4 pr-4 justify-between my-4 font-bold text-lg">
                                <h1>Total Income</h1>
                                <h1>{{ $transaction['incomes']->sum('amount') }}</h1>
                            </div>
                            <div class="w-full flex flex-col my-4 pr-4">
                                <div class="w-full flex justify-between font-bold text-lg">
                                    <h1>Total Expenses</h1>
                                    <h1>{{ $transaction['expenses']->sum('amount') }}</h1>
                                </div>
                                <div class="w-full flex mt-4 justify-between font-bold text-lg  ">
                                    <h1>Total Balance</h1>
                                    <h1>{{ $transaction['incomes']->sum('amount') - $transaction['expenses']->sum('amount') }}
                                    </h1>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

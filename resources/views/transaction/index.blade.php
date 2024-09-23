<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listing') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="flex justify-between mb-4">
                        <div>
                            <a href="{{ route('transactions.create') }}">
                                <x-primary-button>
                                    Add
                                </x-primary-button>
                            </a>
                            <a href="{{ route('transaction.report') }}">
                                <x-primary-button>
                                    Report
                                </x-primary-button>
                            </a>
                        </div>


                        <form action="{{ route('transactions.index') }}" class="flex items-center gap-2" method="GET">
                            <div class="flex items-center gap-2">
                                <x-input-label for="type" :value="__('Type')" />
                                <select id="type"
                                    class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    name="type" :value="$transaction - > type">
                                    <option value="">Please select</option>
                                    @foreach (App\Enums\TransactionType::all() as $type)
                                        <option value="{{ $type }}"
                                            {{ $type == request('type') ? 'selected' : '' }}>{{ $type }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
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
                            <x-secondary-button type="submit">Search</x-secondary-button>
                        </form>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="ltr:text-left rtl:text-right">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Type</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Amount</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Spend Date
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Created At
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($services as $service)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ $service->name }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ $service->type }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $service->amount }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                            {{ $service->spend_date }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                            {{ $service->created_at }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-700">
                                            <a href="{{ route('transactions.edit', $service->id) }}">Edit</a>
                                            <form method="post"
                                                action="{{ route('transactions.destroy', $service->id) }}">
                                                @csrf
                                                @method('delete')
                                                <a :href="route('transactions.destroy', $service - > id)"
                                                    class="hover:cursor-pointer"
                                                    onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $services->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form action="{{ route('transactions.update', $transaction->id) }}" method="post" class="max-w-screen-md">
                        @csrf
                        @method('put')
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name') ?? $transaction->name" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="type" :value="__('Type')" />
                            <select id="type"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="type" :value="old('type') ?? $transaction->type" autofocus autocomplete="type">
                                @foreach (App\Enums\TransactionType::all() as $type)
                                    <option value="{{ $type }}" selected={{ $type == $transaction->type }}>{{ $type }} </option>
                                @endforeach

                            </select>
                            <x-input-error :messages="$errors->get('type')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="amount" :value="__('Amount')" />
                            <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount"
                                :value="old('amount') ?? $transaction->amount" autofocus autocomplete="amount" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="spend_date" :value="__('Spend Date')" />
                            <x-text-input id="spend_date" class="block mt-1 w-full" type="date" name="spend_date"
                                :value="old('spend_date') ?? $transaction->spend_date" autofocus autocomplete="spend_date" />
                            <x-input-error :messages="$errors->get('spend_date')" class="mt-2" />
                        </div>
                        <x-primary-button class="mt-4">Submit</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

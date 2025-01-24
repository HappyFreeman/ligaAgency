<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <form method="post" action="{{ route('products.store') }}" class="mt-6 space-y-6">
                    @csrf
                
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="article" :value="__('Article')" />
                        <x-text-input id="article" name="article" type="text" class="mt-1 block w-full" :value="old('article', $product->article)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('article')" />
                    </div>

                    <div>
                        <x-input-label for="status" :value="__('Status')" />
                        <select 
                            name="status" 
                            id="status" 
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            required
                        >
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Доступен</option>
                            <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Недоступен</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                    </div>

                    <div>
                        <x-input-label for="data" :value="__('Data')" />
                        <textarea 
                            name="data" 
                            id="data" 
                            rows="5" 
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            placeholder='{"color": "red", "size": "L"}'
                        >
                            {{ old('data') }}
                        </textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('data')" />
                    </div>
                
                
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Сохранить') }}</x-primary-button>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Отменить
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</x-app-layout>

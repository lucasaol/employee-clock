@csrf

<div class="space-y-4">

    <div class="mb-4 w-full">
        <label for="name" class="block font-medium text-sm">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" value="{{old('name')}}" required autofocus
               class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('name') border-red-500 @enderror">
        @error('name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 block">
        <label for="email" class="block font-medium text-sm">{{ __('E-mail') }}</label>
        <input id="email" type="email" name="email" value="{{old('email')}}" required
               class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('email') border-red-500 @enderror">
        @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 block">
        <label for="password" class="block font-medium text-sm">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required
               class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('password') border-red-500 @enderror">
        @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 block">
        <label for="confirm_password" class="block font-medium text-sm">{{ __('Confirm password') }}</label>
        <input id="confirm_password" type="password" name="confirm_password" required
               class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('confirm_password') border-red-500 @enderror">
        @error('confirm_password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 block">
        <label for="position" class="block font-medium text-sm">{{ __('Position') }}</label>
        <input id="position" type="text" name="position" required
               class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('position') border-red-500 @enderror">
        @error('position')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 block">
        <label for="birth_date" class="block font-medium text-sm">{{ __('Birth date') }}</label>
        <input id="birth_date" type="text" name="position" required
               class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('birth_date') border-red-500 @enderror">
        @error('birth_date')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit"
                class="w-full bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
            {{ $submitLabel ?? __('Save') }}
        </button>
    </div>
</div>

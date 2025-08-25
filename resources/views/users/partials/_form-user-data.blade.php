<h6 class="font-semibold text-gray-800 dark:text-gray-100 mb-6">{{__('Employee')}}</h6>

<div class="space-y-4 grid grid-cols-3">
    <div class="mb-4 pr-4 col-span-2">
        <label for="name" class="block font-medium text-sm">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" value="{{old('name')}}" required autofocus
               class=" w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('name') border-red-500 @enderror">
        @error('name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="document" class="block font-medium text-sm">{{ __('Document') }}</label>
        <input id="document" type="tel" name="document" value="{{old('document')}}" required
               class="cpf-mask w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('document') border-red-500 @enderror">
        @error('document')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="space-y-4 grid grid-cols-3">
    <div class="mb-4 pr-4">
        <label for="email" class="block font-medium text-sm">{{ __('E-mail') }}</label>
        <input id="email" type="email" name="email" value="{{old('email')}}" required
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('email') border-red-500 @enderror">
        @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="password" class="block font-medium text-sm">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('password') border-red-500 @enderror">
        @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="password_confirmation" class="block font-medium text-sm">{{ __('Confirm password') }}</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('password_confirmation') border-red-500 @enderror">
        @error('password_confirmation')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="position" class="block font-medium text-sm">{{ __('Position') }}</label>
        <input id="position" type="text" name="position" required value="{{old('position')}}"
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('position') border-red-500 @enderror">
        @error('position')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="birth_date" class="block font-medium text-sm">{{ __('Birth date') }}</label>
        <input id="birth_date" type="text" name="birth_date" required value="{{old('birth_date')}}"
               class="date-mask w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('birth_date') border-red-500 @enderror">
        @error('birth_date')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
</div>

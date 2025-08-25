<h6 class="font-semibold text-gray-800 dark:text-gray-100 mb-6">{{__('Address')}}</h6>

<div class="space-y-4 grid grid-cols-4">
    <div class="mb-4 pr-4">
        <label for="zipcode" class="block font-medium text-sm">{{ __('address.Zipcode') }}</label>
        <input id="zipcode" type="tel" name="zipcode" value="{{old('zipcode', $user->address->zipcode ?? '')}}" required
               data-mask="cep"
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('zipcode') border-red-500 @enderror">
        @error('zipcode')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4 col-span-2">
        <label for="street" class="block font-medium text-sm">{{ __('address.Street') }}</label>
        <input id="street" type="tel" name="street" value="{{old('street', $user->address->street ?? '')}}" required
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('street') border-red-500 @enderror">
        @error('street')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="number" class="block font-medium text-sm">{{ __('address.Number') }}</label>
        <input id="number" type="tel" name="number" required value="{{old('number', $user->address->number ?? '')}}"
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('number') border-red-500 @enderror">
        @error('number')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="complement" class="block font-medium text-sm">{{ __('address.Complement') }}</label>
        <input id="complement" type="text" name="complement" required value="{{old('complement', $user->address->complement ?? '')}}"
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('complement') border-red-500 @enderror">
        @error('complement')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="neighborhood" class="block font-medium text-sm">{{ __('address.Neighborhood') }}</label>
        <input id="neighborhood" type="text" name="neighborhood" required value="{{old('neighborhood', $user->address->neighborhood ?? '')}}"
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('neighborhood') border-red-500 @enderror">
        @error('neighborhood')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="city" class="block font-medium text-sm">{{ __('address.City') }}</label>
        <input id="city" type="text" name="city" required value="{{old('city', $user->address->city ?? '')}}"
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('city') border-red-500 @enderror">
        @error('city')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4 pr-4">
        <label for="state" class="block font-medium text-sm">{{ __('address.State') }}</label>
        <input id="state" type="text" name="state" required value="{{old('state', $user->address->state ?? '')}}"
               class="w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  @error('state') border-red-500 @enderror">
        @error('state')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
</div>

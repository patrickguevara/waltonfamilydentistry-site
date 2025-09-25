<form wire:submit.prevent="submit" class="space-y-6" aria-live="polite">
    <div>
        <label for="contact-name" class="block text-sm font-medium">{{ __('Name') }}</label>
        <input
            wire:model.blur="name"
            type="text"
            id="contact-name"
            name="name"
            autocomplete="name"
            class="mt-1 w-full rounded-2xl border border-black/10 bg-white px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-black"
            required
        />
        @error('name')
            <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="contact-email" class="block text-sm font-medium">{{ __('Email') }}</label>
        <input
            wire:model.blur="email"
            type="email"
            id="contact-email"
            name="email"
            autocomplete="email"
            class="mt-1 w-full rounded-2xl border border-black/10 bg-white px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-black"
            required
        />
        @error('email')
            <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="contact-phone" class="block text-sm font-medium">{{ __('Phone (optional)') }}</label>
        <input
            wire:model.blur="phone"
            type="tel"
            id="contact-phone"
            name="phone"
            autocomplete="tel"
            class="mt-1 w-full rounded-2xl border border-black/10 bg-white px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-black"
            inputmode="tel"
        />
        @error('phone')
            <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="contact-message" class="block text-sm font-medium">{{ __('How can we help?') }}</label>
        <textarea
            wire:model.blur="message"
            id="contact-message"
            name="message"
            rows="5"
            class="mt-1 w-full rounded-2xl border border-black/10 bg-white px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-black"
            required
        ></textarea>
        @error('message')
            <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
        @enderror
    </div>

    <div class="sr-only" aria-hidden="true">
        <label for="contact-details">{{ __('Details') }}</label>
        <input type="text" id="contact-details" name="details" wire:model="details" autocomplete="off" tabindex="-1" />
    </div>

    @error('form')
        <p class="text-sm text-red-600" role="alert">{{ $message }}</p>
    @enderror

    @if($submitted && $feedback)
        <p class="rounded-2xl border border-black/10 bg-black text-white px-4 py-3 text-sm">{{ $feedback }}</p>
    @endif

    <button
        type="submit"
        class="inline-flex w-full justify-center rounded-2xl bg-black px-6 py-3 text-base font-medium text-white transition hover:bg-black/90 focus:outline-none focus:ring-2 focus:ring-black disabled:cursor-not-allowed disabled:opacity-70"
        wire:loading.attr="disabled"
        data-cta="contact-submit"
    >
        <span wire:loading.class="hidden">{{ __('Send Message') }}</span>
        <span wire:loading>{{ __('Sending…') }}</span>
    </button>
</form>

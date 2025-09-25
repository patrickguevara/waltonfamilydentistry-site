<div
    x-data="scheduleModal($wire)"
    x-init="init()"
    x-on:keydown.escape.window.prevent="close()"
>
    <button
        type="button"
        class="hidden"
        x-ref="trigger"
    ></button>

    <template x-teleport="body">
        <div
            x-show="isOpen"
            x-trap.noscroll="isOpen"
            class="fixed inset-0 z-50 flex items-center justify-center p-6"
            role="presentation"
        >
            <div
                class="absolute inset-0 bg-black/70"
                x-show="isOpen"
                x-transition.opacity
                aria-hidden="true"
                @click="close()"
            ></div>

            <div
                x-show="isOpen"
                x-transition.scale.origin-center
                class="relative w-full max-w-lg rounded-3xl bg-white p-8 shadow-xl focus:outline-none"
                role="dialog"
                aria-modal="true"
                aria-labelledby="schedule-modal-title"
                tabindex="-1"
            >
                <button
                    type="button"
                    class="absolute right-4 top-4 rounded-full border border-black/10 px-3 py-1 text-sm font-medium hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-black"
                    @click="close()"
                >
                    {{ __('Close') }}
                </button>

                <h2 id="schedule-modal-title" class="text-2xl font-semibold text-black">
                    {{ __('Schedule an Appointment') }}
                </h2>
                <p class="mt-3 text-base text-black/70">
                    {{ __('You’ll be redirected to our secure scheduling portal to reserve your visit.') }}
                </p>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a
                        href="{{ $schedulingUrl }}"
                        target="_blank"
                        rel="noopener"
                        class="flex-1 rounded-2xl bg-black px-6 py-3 text-center text-base font-semibold text-white transition hover:bg-black/90 focus:outline-none focus:ring-2 focus:ring-black"
                        data-cta="schedule-modal"
                    >
                        {{ __('Continue to Schedule') }}
                    </a>
                    <x-phone-link class="flex-1 rounded-2xl border border-black px-6 py-3 text-center text-base font-semibold text-black hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-black" />
                </div>
            </div>
        </div>
    </template>
</div>

@once
    @push('scripts')
        <script>
            function scheduleModal(wire) {
                return {
                    isOpen: @entangle('open').live,
                    init() {
                        this.$watch('isOpen', (value) => {
                            if (value) {
                                this.$nextTick(() => {
                                    const dialog = this.$root.querySelector('[role="dialog"]');
                                    if (dialog) {
                                        dialog.focus();
                                    }
                                });
                            }
                        });

                        window.addEventListener('open-schedule-modal', () => this.open());
                    },
                    open() {
                        this.isOpen = true;
                    },
                    close() {
                        this.isOpen = false;
                    },
                };
            }
        </script>
    @endpush
@endonce

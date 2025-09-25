@php($id = \Illuminate\Support\Str::uuid())

<section
    x-data="reviewsCarousel({{ $reviews->count() }})"
    id="reviews-carousel-{{ $id }}"
    class="relative"
    aria-roledescription="carousel"
>
    <div class="overflow-hidden rounded-3xl border border-black/10 bg-white">
        <ul
            class="flex transition-transform duration-500 ease-out"
            :style="`transform: translateX(-${active * 100}%);`">
            @foreach($reviews as $index => $review)
                <li
                    class="w-full shrink-0 px-6 py-8 md:px-10"
                    role="group"
                    aria-roledescription="slide"
                    :aria-current="active === {{ $index }} ? 'true' : 'false'"
                >
                    <x-review :review="$review" />
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <button
                type="button"
                class="rounded-full border border-black/10 px-4 py-2 text-sm font-medium hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-black"
                @click="prev()"
                :aria-disabled="active === 0"
            >
                {{ __('Previous') }}
            </button>
            <button
                type="button"
                class="rounded-full border border-black/10 px-4 py-2 text-sm font-medium hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-black"
                @click="next()"
            >
                {{ __('Next') }}
            </button>
        </div>

        <div class="flex items-center gap-2">
            @foreach($reviews as $index => $review)
                <button
                    type="button"
                    class="h-2 w-6 rounded-full transition"
                    :class="active === {{ $index }} ? 'bg-black' : 'bg-black/20'
                    "
                    @click="go({{ $index }})"
                    :aria-current="active === {{ $index }} ? 'true' : 'false'"
                    aria-label="{{ __('Show review :number', ['number' => $index + 1]) }}"
                ></button>
            @endforeach
        </div>
    </div>
</section>

@once
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('reviewsCarousel', (count) => ({
                    count,
                    active: 0,
                    timer: null,
                    init() {
                        this.$watch('active', () => this.resetTimer());
                        if (!this.prefersReducedMotion()) {
                            this.startTimer();
                        }
                        this.$root.addEventListener('mouseenter', () => this.pause());
                        this.$root.addEventListener('mouseleave', () => this.play());
                        this.$root.addEventListener('focusin', () => this.pause());
                        this.$root.addEventListener('focusout', () => this.play());
                    },
                    next() {
                        this.active = (this.active + 1) % this.count;
                    },
                    prev() {
                        this.active = this.active === 0 ? this.count - 1 : this.active - 1;
                    },
                    go(index) {
                        this.active = index;
                    },
                    prefersReducedMotion() {
                        return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                    },
                    startTimer() {
                        if (this.prefersReducedMotion() || this.count <= 1) {
                            return;
                        }
                        this.timer = setInterval(() => this.next(), 7000);
                    },
                    resetTimer() {
                        if (!this.timer) {
                            return;
                        }
                        clearInterval(this.timer);
                        this.timer = null;
                        this.startTimer();
                    },
                    pause() {
                        if (this.timer) {
                            clearInterval(this.timer);
                            this.timer = null;
                        }
                    },
                    play() {
                        if (!this.timer) {
                            this.startTimer();
                        }
                    },
                }));
            });
        </script>
    @endpush
@endonce

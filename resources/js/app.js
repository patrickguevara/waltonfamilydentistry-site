if (typeof document !== 'undefined') {
    document.addEventListener('DOMContentLoaded', () => {
        document.body.addEventListener('click', (event) => {
            const trigger = event.target.closest('[data-schedule-trigger]');
            if (trigger) {
                event.preventDefault();
                window.dispatchEvent(new CustomEvent('open-schedule-modal'));
            }
        });
    });
}

window.addEventListener('open-schedule-modal', () => {
    if (window.Livewire?.dispatch) {
        window.Livewire.dispatch('openScheduleModal');
    }
});

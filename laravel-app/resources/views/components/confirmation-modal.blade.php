<div class="modal" tabindex="-1" id="confirmation-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="cm-header">
                <h5 class="modal-title">Confirm action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="cm-body">
                <p>Are sure you want to do this?</p>
            </div>
            <div class="modal-footer" id="cm-footer">
                <button type="button" class="btn button" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-secondary" id="cm-btn-yes">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    const $cmHeader = $('#cm-header')
    const $cmBody = $('#cm-body')
    const $cmFooter = $('#cm-footer')
    const $cmBtnYes = $('#cm-btn-yes')
    const processing = false

    const $confirmationModal = new bootstrap.Modal('#confirmation-modal', {
        backdrop: true,
    })

    document.addEventListener('confirmed', function(event) {
        $cmHeader.addClass('d-none')
        $cmFooter.addClass('d-none')
        $cmBody.html('<div class="text-center">Please wait...</div>')
    })

    document.addEventListener('confirm', function(event) {
        if (!event?.detail?.action) {
            console.warn('Event action required for confirmation')
            return
        }
        $cmBtnYes.on('click', () => {
            document.dispatchEvent(new CustomEvent('confirmed'))
            event.detail.action()
        })
        $confirmationModal.show()
    })
})
</script>

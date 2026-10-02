/**
 * Dar Alroaya Exam System — Global JS Helpers
 */

$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

/**
 * Show a dismissible alert in #alert-container
 */
function showAlert(message, type = 'info') {
    const icons = { success: 'check-circle', danger: 'exclamation-triangle', warning: 'exclamation-circle', info: 'info-circle' };
    const icon  = icons[type] || 'info-circle';
    const html  = `
        <div class="alert alert-${type} alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-${icon} me-2"></i>${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;
    $('#alert-container').html(html);
    // Auto-dismiss after 4s
    setTimeout(() => $('#alert-container .alert').alert('close'), 4000);
}

/**
 * Toggle loading state on a button
 */
function setLoading(btn, loading) {
    const spinner = btn.find('.spinner-border');
    const text    = btn.find('.btn-text');
    if (loading) {
        btn.prop('disabled', true);
        text.addClass('d-none');
        spinner.removeClass('d-none');
    } else {
        btn.prop('disabled', false);
        text.removeClass('d-none');
        spinner.addClass('d-none');
    }
}

/**
 * Confirm delete using the shared modal
 */
let _deleteCallback = null;
let _deleteUrl      = null;

function confirmDelete(message, url, onSuccess) {
    _deleteUrl      = url;
    _deleteCallback = onSuccess;
    $('#confirmDeleteMessage').text(message);
    new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
}

$(document).on('click', '#confirmDeleteBtn', function() {
    if (!_deleteUrl) return;
    const btn = $(this);
    btn.prop('disabled', true).text('جاري الحذف...');

    $.ajax({
        url: _deleteUrl,
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal')).hide();
            showAlert(res.message || 'تم الحذف بنجاح.', 'success');
            btn.prop('disabled', false).text('حذف');
            if (typeof _deleteCallback === 'function') _deleteCallback();
        },
        error: function(xhr) {
            showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء الحذف.', 'danger');
            btn.prop('disabled', false).text('حذف');
        }
    });
});

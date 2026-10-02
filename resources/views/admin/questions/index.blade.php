@extends('layouts.admin')
@section('title', 'بنك الأسئلة')
@section('page-title', 'بنك الأسئلة')

@section('content')
<!-- Filters -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.questions.index') }}" class="row g-2 align-items-end" id="filter-form">
            <input type="hidden" name="per_page" id="filter-per-page" value="{{ request('per_page', 25) }}">
            <div class="col-md-4">
                <label class="form-label small fw-medium">المقياس</label>
                <select name="assessment_id" class="form-select form-select-sm" id="filter-assessment">
                    <option value="">كل المقاييس</option>
                    @foreach($assessments as $a)
                        <option value="{{ $a->id }}" {{ request('assessment_id') == $a->id ? 'selected' : '' }}>
                            {{ $a->title_ar }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-medium">البُعد</label>
                <select name="dimension_id" class="form-select form-select-sm" id="filter-dimension">
                    <option value="">كل الأبعاد</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-medium">بحث في النص</label>
                <input type="text" name="search" class="form-control form-control-sm"
                    value="{{ request('search') }}" placeholder="كلمة بحث...">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-search me-1"></i>بحث
                </button>
            </div>
        </form>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center gap-2">
        <span class="text-muted small">{{ $questions->total() }} سؤال</span>
        <span class="text-muted small text-black-50">|</span>
        <label class="small text-muted mb-0">عرض:</label>
        <select id="per-page-select" class="form-select form-select-sm d-inline-block w-auto py-0 px-2" style="height: 28px;">
            <option value="25" {{ request('per_page', 25) == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
            <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>الكل</option>
        </select>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#bulkModal">
            <i class="bi bi-upload me-1"></i>استيراد بالجملة
        </button>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#questionModal">
            <i class="bi bi-plus-circle me-1"></i>إضافة سؤال
        </button>
    </div>
</div>

<div id="questions-table-wrapper">
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 40px;" class="text-center">
                        <input type="checkbox" class="form-check-input" id="check-all">
                    </th>
                    @if(request('assessment_id'))
                        <th style="width: 40px;"></th>
                    @endif
                    <th style="width:45%">نص السؤال</th>
                    <th>المقياس</th>
                    <th style="width:20%">البُعد</th>
                    <th>الخيارات</th>
                    <th class="text-end" style="width:100px;">العمليات</th>
                </tr>
            </thead>
            <tbody id="sortable-questions">
                @forelse($questions as $q)
                <tr data-id="{{ $q->id }}">
                    <td class="text-center">
                        <input type="checkbox" class="form-check-input check-row" data-id="{{ $q->id }}">
                    </td>
                    @if(request('assessment_id'))
                        <td>
                            <span class="drag-handle text-muted">
                                <i class="bi bi-grip-vertical fs-5"></i>
                            </span>
                        </td>
                    @endif
                    <td class="question-text-cell small" data-id="{{ $q->id }}">
                        <span class="question-text-display">{{ $q->text_ar }}</span>
                    </td>
                    @php
                        $currentAssessment = $assessments->firstWhere('id', $q->assessment_id);
                    @endphp
                    <td class="small text-muted">{{ $q->assessment_title }}</td>
                    <td>
                        @if(!$currentAssessment || $currentAssessment->dimensions->isEmpty())
                            <span class="text-muted small">لا توجد أبعاد</span>
                        @else
                            <select class="form-select form-select-sm select-dimension" data-question-id="{{ $q->id }}">
                                <option value="">بدون بُعد</option>
                                @foreach($currentAssessment->dimensions as $d)
                                    <option value="{{ $d->id }}" {{ $q->dimension_id == $d->id ? 'selected' : '' }}>
                                        {{ $d->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </td>
                    <td><span class="badge bg-light text-dark border">{{ $q->answer_options_count }}</span></td>
                    <td>
                        <div class="d-flex gap-1 justify-content-end">
                            <button class="btn btn-sm btn-outline-primary btn-edit-q" data-id="{{ $q->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger btn-delete-q"
                                    data-id="{{ $q->id }}"
                                    data-url="{{ route('admin.questions.destroy', $q->id) }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ request('assessment_id') ? 7 : 6 }}" class="text-center text-muted py-4">
                        لا توجد أسئلة.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-transparent border-0">{{ $questions->appends(request()->query())->links() }}</div>
</div>
</div>

<!-- Add Question Modal -->
<div class="modal fade" id="questionModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إضافة سؤال جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المقياس *</label>
                        <select class="form-select" id="q-assessment_id">
                            <option value="">اختر المقياس</option>
                            @foreach($assessments as $a)
                                <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">البُعد</label>
                        <select class="form-select" id="q-dimension_id">
                            <option value="">اختر البُعد</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">نص السؤال *</label>
                        <textarea class="form-control" id="q-text_ar" rows="3" placeholder="اكتب نص السؤال هنا..."></textarea>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 fw-semibold">خيارات الإجابة</h6>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-add-option">
                        <i class="bi bi-plus me-1"></i>إضافة خيار
                    </button>
                </div>
                <div id="options-container"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-question">
                    <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ السؤال</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Import Modal -->
<div class="modal fade" id="bulkModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">استيراد أسئلة بالجملة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المقياس *</label>
                        <select class="form-select" id="bulk-assessment_id">
                            <option value="">اختر المقياس</option>
                            @foreach($assessments as $a)
                                <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">البُعد</label>
                        <select class="form-select" id="bulk-dimension_id">
                            <option value="">اختر البُعد (اختياري)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الأسئلة (سؤال في كل سطر)</label>
                        <textarea class="form-control" id="bulk-questions_text" rows="8"
                            placeholder="السؤال الأول هنا&#10;السؤال الثاني هنا&#10;السؤال الثالث هنا"></textarea>
                        <div class="form-text">سيتم إنشاء خيارات افتراضية: نعم (2) / إلى حد ما (1) / لا (0)</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-bulk-import">
                    <span class="btn-text"><i class="bi bi-upload me-1"></i>استيراد</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .drag-handle {
        cursor: grab;
    }
    .drag-handle:active {
        cursor: grabbing;
    }
    .fs-7 {
        font-size: 0.8rem;
    }
    #bulk-action-bar {
        transition: all 0.3s ease-in-out;
    }
    .question-edit-textarea {
        min-height: 60px;
        resize: none;
    }
</style>
@endpush

@push('scripts')
<script>
let optIndex = 0;

function addOptionRow(label='', score='') {
    const idx = optIndex++;
    $('#options-container').append(`
        <div class="row g-2 mb-2 opt-row">
            <div class="col-7">
                <input type="text" class="form-control form-control-sm opt-label" placeholder="نص الخيار" value="${label}">
            </div>
            <div class="col-3">
                <input type="number" class="form-control form-control-sm opt-score" placeholder="القيمة" value="${score}">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-sm btn-outline-danger w-100 btn-remove-opt">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `);
}

// Default options on modal open
$('#questionModal').on('show.bs.modal', function() {
    $('#options-container').html('');
    optIndex = 0;
    addOptionRow('نعم', 2);
    addOptionRow('إلى حد ما', 1);
    addOptionRow('لا', 0);
});

$('#btn-add-option').on('click', () => addOptionRow());

$(document).on('click', '.btn-remove-opt', function() {
    $(this).closest('.opt-row').remove();
});

// Dynamic dimensions on assessment change
function loadDimensions(assessmentId, targetSelect, selectedId='') {
    let defaultText = 'بدون بُعد';
    if (targetSelect.attr('id') === 'filter-dimension') {
        defaultText = 'كل الأبعاد';
    } else if (targetSelect.attr('id') === 'q-dimension_id') {
        defaultText = 'اختر البُعد';
    } else if (targetSelect.attr('id') === 'bulk-dimension_id') {
        defaultText = 'اختر البُعد (اختياري)';
    } else if (targetSelect.attr('id') === 'bulk-dimension-id') {
        defaultText = 'تعيين البُعد للمحددة...';
    }

    if (!assessmentId) {
        targetSelect.html(`<option value="">${defaultText}</option>`);
        return;
    }

    $.get('{{ route('admin.dimensions.byAssessment', ':id') }}'.replace(':id', assessmentId), function(dims) {
        let opts = `<option value="">${defaultText}</option>`;
        dims.forEach(d => {
            let label = d.name_ar;
            if (targetSelect.attr('id') === 'filter-dimension' && d.questions_count !== undefined) {
                label += ` (${d.questions_count})`;
            }
            opts += `<option value="${d.id}" ${d.id == selectedId ? 'selected' : ''}>${label}</option>`;
        });
        targetSelect.html(opts);
    });
}

$('#q-assessment_id').on('change', function() {
    loadDimensions($(this).val(), $('#q-dimension_id'));
});

$('#bulk-assessment_id').on('change', function() {
    loadDimensions($(this).val(), $('#bulk-dimension_id'));
});

$('#filter-assessment').on('change', function() {
    loadDimensions($(this).val(), $('#filter-dimension'), '');
});

// Initialize filter dimension if assessment already selected
@if(request('assessment_id'))
loadDimensions('{{ request('assessment_id') }}', $('#filter-dimension'), '{{ request('dimension_id') }}');
@endif

// Reload table container via AJAX
function reloadTable() {
    $('#questions-table-wrapper').css('opacity', 0.5);
    $('#questions-table-wrapper').load(window.location.href + ' #questions-table-wrapper > *', function() {
        $('#questions-table-wrapper').css('opacity', 1);
        initSortable();
        resetBulkActions();
    });
}

// Bulk Actions selection logic
$(document).on('change', '#check-all', function() {
    const isChecked = $(this).is(':checked');
    $('.check-row').prop('checked', isChecked);
    updateBulkBar();
});

$(document).on('change', '.check-row', function() {
    const allChecked = $('.check-row').length === $('.check-row:checked').length;
    $('#check-all').prop('checked', allChecked);
    updateBulkBar();
});

function updateBulkBar() {
    const selectedIds = [];
    $('.check-row:checked').each(function() {
        selectedIds.push($(this).data('id'));
    });

    const count = selectedIds.length;
    if (count > 0) {
        $('#selected-count').text(count);
        $('#bulk-action-bar').removeClass('d-none');
    } else {
        $('#bulk-action-bar').addClass('d-none');
    }
}

function resetBulkActions() {
    $('#check-all').prop('checked', false);
    $('.check-row').prop('checked', false);
    $('#bulk-action-bar').addClass('d-none');
}

// Bulk Delete Action
$(document).on('click', '.btn-bulk-delete', function() {
    const selectedIds = [];
    $('.check-row:checked').each(function() {
        selectedIds.push($(this).data('id'));
    });

    if (selectedIds.length === 0) return;

    const url = '{{ route('admin.questions.bulkDelete') }}?' + selectedIds.map(id => `ids[]=${id}`).join('&');
    confirmDelete(`هل تريد حذف ${selectedIds.length} سؤال محدد نهائياً؟`, url, function() {
        reloadTable();
    });
});

// Bulk Assign Dimension Action
$(document).on('click', '.btn-bulk-assign', function() {
    const selectedIds = [];
    $('.check-row:checked').each(function() {
        selectedIds.push($(this).data('id'));
    });

    if (selectedIds.length === 0) return;

    const dimensionId = $('#bulk-dimension-id').val();
    const payload = {
        ids: selectedIds,
        dimension_id: dimensionId === 'none' ? null : dimensionId
    };

    const btn = $(this);
    btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

    $.ajax({
        url: '{{ route('admin.questions.bulkAssignDimension') }}',
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        contentType: 'application/json',
        data: JSON.stringify(payload),
        success: function(res) {
            btn.prop('disabled', false).html('<i class="bi bi-tag me-1"></i>تعيين');
            showAlert(res.message || 'تم تعيين البُعد بنجاح.', 'success');
            reloadTable();
        },
        error: function(xhr) {
            btn.prop('disabled', false).html('<i class="bi bi-tag me-1"></i>تعيين');
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Single inline dimension change
$(document).on('change', '.select-dimension', function() {
    const select = $(this);
    const questionId = select.data('question-id');
    const dimensionId = select.val();

    select.prop('disabled', true);

    $.ajax({
        url: '{{ route('admin.questions.assignDimension', ':id') }}'.replace(':id', questionId),
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { dimension_id: dimensionId },
        success: function(res) {
            select.prop('disabled', false);
            showAlert(res.message || 'تم تحديد البُعد.', 'success');
        },
        error: function(xhr) {
            select.prop('disabled', false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Inline Edit Textarea Auto-resize
$(document).on('input', '.question-edit-textarea', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Inline Edit Click
$(document).on('click', '.btn-edit-q', function() {
    const row = $(this).closest('tr');
    const qId = $(this).data('id');
    const textCell = row.find('.question-text-cell');

    if (textCell.find('.edit-mode-container').length > 0) return;

    const displaySpan = textCell.find('.question-text-display');
    const originalText = displaySpan.text().trim();
    textCell.data('original-text', originalText);

    textCell.html(`
        <div class="edit-mode-container">
            <textarea class="form-control form-control-sm question-edit-textarea">${originalText}</textarea>
            <div class="d-flex gap-1 mt-1 justify-content-end">
                <button class="btn btn-sm btn-success btn-save-inline py-0 px-2 fs-7" data-id="${qId}">حفظ</button>
                <button class="btn btn-sm btn-secondary btn-cancel-inline py-0 px-2 fs-7" data-id="${qId}">إلغاء</button>
            </div>
        </div>
    `);

    row.find('.btn-edit-q, .btn-delete-q').addClass('d-none');

    const textarea = textCell.find('.question-edit-textarea');
    textarea.focus();
    textarea.each(function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
});

// Inline Edit Cancel
$(document).on('click', '.btn-cancel-inline', function() {
    const row = $(this).closest('tr');
    const textCell = row.find('.question-text-cell');
    const originalText = textCell.data('original-text');

    textCell.html(`<span class="question-text-display">${originalText}</span>`);
    row.find('.btn-edit-q, .btn-delete-q').removeClass('d-none');
});

// Inline Edit Save
$(document).on('click', '.btn-save-inline', function() {
    const btn = $(this);
    const row = btn.closest('tr');
    const qId = btn.data('id');
    const textCell = row.find('.question-text-cell');
    const newText = textCell.find('.question-edit-textarea').val().trim();

    if (newText === '') {
        showAlert('نص السؤال مطلوب.', 'warning');
        return;
    }

    btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

    $.ajax({
        url: `{{ route('admin.questions.index') }}/${qId}`,
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { text_ar: newText },
        success: function(res) {
            showAlert(res.message || 'تم تحديث السؤال.', 'success');
            textCell.html(`<span class="question-text-display">${newText}</span>`);
            row.find('.btn-edit-q, .btn-delete-q').removeClass('d-none');
        },
        error: function(xhr) {
            btn.prop('disabled', false).text('حفظ');
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Page size change
$(document).on('change', '#per-page-select', function() {
    $('#filter-per-page').val($(this).val());
    $('#filter-form').submit();
});

// Save question modal
$('#btn-save-question').on('click', function() {
    const btn = $(this);
    const options = [];
    $('.opt-row').each(function(i) {
        const label = $(this).find('.opt-label').val().trim();
        const score = $(this).find('.opt-score').val();
        if (label !== '') {
            options.push({ label_ar: label, score_value: parseInt(score) || 0, order_index: i });
        }
    });

    const payload = {
        assessment_id: $('#q-assessment_id').val(),
        dimension_id:  $('#q-dimension_id').val() || null,
        text_ar:       $('#q-text_ar').val().trim(),
        options:       options,
    };

    if (!payload.assessment_id || !payload.text_ar) {
        showAlert('المقياس ونص السؤال مطلوبان.', 'warning'); return;
    }

    setLoading(btn, true);
    $.ajax({
        url: '{{ route('admin.questions.store') }}',
        method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance($('#questionModal')).hide();
            showAlert(res.message, 'success');
            reloadTable();
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Bulk import modal
$('#btn-bulk-import').on('click', function() {
    const btn = $(this);
    const payload = {
        assessment_id:   $('#bulk-assessment_id').val(),
        dimension_id:    $('#bulk-dimension_id').val() || null,
        questions_text:  $('#bulk-questions_text').val().trim(),
    };
    if (!payload.assessment_id || !payload.questions_text) {
        showAlert('اختر المقياس وأدخل الأسئلة.', 'warning'); return;
    }
    setLoading(btn, true);
    $.ajax({
        url: '{{ route('admin.questions.bulk') }}',
        method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance($('#bulkModal')).hide();
            showAlert(res.message, 'success');
            reloadTable();
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Delete question
$(document).on('click', '.btn-delete-q', function() {
    const url = $(this).data('url');
    confirmDelete('هل تريد حذف هذا السؤال نهائياً؟', url, () => reloadTable());
});

// SortableJS initialization
function initSortable() {
    @if(request('assessment_id'))
    const el = document.getElementById('sortable-questions');
    if (el) {
        new Sortable(el, {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function (evt) {
                const order = [];
                $('#sortable-questions tr').each(function() {
                    const id = $(this).data('id');
                    if (id) {
                        order.push(id);
                    }
                });

                $.ajax({
                    url: '{{ route('admin.questions.reorder') }}',
                    method: 'PATCH',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: { order: order },
                    success: function(res) {
                        showAlert('تم تحديث ترتيب الأسئلة بنجاح.', 'success');
                    },
                    error: function(xhr) {
                        showAlert('حدث خطأ أثناء إعادة الترتيب.', 'danger');
                    }
                });
            }
        });
    }
    @endif
}

// Initial calls
$(document).ready(function() {
    initSortable();
});
</script>
@endpush

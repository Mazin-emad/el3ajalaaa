@extends('layouts.admin')
@section('title', 'أسئلة الشهادات الاحترافية')
@section('page-title', 'أسئلة الشهادات الاحترافية')

@section('content')
<!-- Filters -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.graded_exams.questions.index') }}" class="row g-2 align-items-end" id="filter-form">
            <input type="hidden" name="per_page" id="filter-per-page" value="{{ request('per_page', 25) }}">
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">الشهادة</label>
                <select name="graded_exam_id" class="form-select form-select-sm" id="filter-exam">
                    <option value="">الكل</option>
                    @foreach($exams as $e)
                        <option value="{{ $e->id }}" {{ request('graded_exam_id') == $e->id ? 'selected' : '' }}>
                            {{ $e->title_ar }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">الوحدة</label>
                <select name="unit_id" class="form-select form-select-sm" id="filter-unit">
                    <option value="">الكل</option>
                    @foreach($units as $u)
                        <option value="{{ $u->id }}" {{ request('unit_id') == $u->id ? 'selected' : '' }}>
                            {{ $u->title_ar }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">المستوى</label>
                <select name="level" class="form-select form-select-sm">
                    <option value="">الكل</option>
                    <option value="easy" {{ request('level') == 'easy' ? 'selected' : '' }}>سهل</option>
                    <option value="medium" {{ request('level') == 'medium' ? 'selected' : '' }}>متوسط</option>
                    <option value="hard" {{ request('level') == 'hard' ? 'selected' : '' }}>صعب</option>
                </select>
            </div>
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">النوع</label>
                <select name="question_type" class="form-select form-select-sm">
                    <option value="">الكل</option>
                    <option value="mcq_single" {{ request('question_type') == 'mcq_single' ? 'selected' : '' }}>اختياري (إجابة واحدة)</option>
                    <option value="mcq_multi" {{ request('question_type') == 'mcq_multi' ? 'selected' : '' }}>اختياري (متعدد)</option>
                    <option value="true_false" {{ request('question_type') == 'true_false' ? 'selected' : '' }}>صح / خطأ</option>
                </select>
            </div>
            
            <div class="col-md-1">
                <label class="form-label small fw-medium">الخيارات</label>
                <select name="options_count" class="form-select form-select-sm">
                    <option value="">الكل</option>
                    <option value="2" {{ request('options_count') == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ request('options_count') == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ request('options_count') == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ request('options_count') == '5' ? 'selected' : '' }}>5</option>
                    <option value="other" {{ request('options_count') == 'other' ? 'selected' : '' }}>+5</option>
                </select>
            </div>
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">بحث في النص</label>
                <input type="text" name="search" class="form-control form-control-sm"
                    value="{{ request('search') }}" placeholder="كلمة بحث...">
            </div>
            
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-search"></i>
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
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
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
                    <th style="width: 50px;">رقم</th>
                    <th style="width: 45%;">نص السؤال</th>
                    <th>الوحدة</th>
                    <th>المستوى</th>
                    <th>النوع</th>
                    <th class="text-center">الخيارات</th>
                    <th class="text-end" style="width:120px;">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($questions as $q)
                <tr data-id="{{ $q->id }}">
                    <td class="text-muted small">{{ $q->original_number }}</td>
                    
                    <td class="question-text-cell small" data-id="{{ $q->id }}">
                        <span class="question-text-display fw-medium d-block mb-1">{{ $q->text_ar }}</span>
                        @if($q->explanation_ar)
                            <span class="question-explanation-display text-muted" style="font-size: 0.75rem;">
                                <i class="bi bi-info-circle me-1"></i>{{ Str::limit($q->explanation_ar, 80) }}
                            </span>
                            <div class="d-none full-explanation">{{ $q->explanation_ar }}</div>
                        @endif
                        <div class="d-none question-level">{{ $q->level }}</div>
                        <div class="d-none question-type">{{ $q->question_type }}</div>
                    </td>
                    
                    <td class="small text-muted">{{ $q->unit ? $q->unit->title_ar : 'بدون وحدة' }}</td>
                    
                    <td>
                        @if($q->level == 'easy')
                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">سهل</span>
                        @elseif($q->level == 'medium')
                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">متوسط</span>
                        @else
                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">صعب</span>
                        @endif
                    </td>
                    
                    <td class="small text-muted">
                        {{ $q->question_type == 'mcq' ? 'اختياري' : 'صح/خطأ' }}
                    </td>
                    
                    <td class="text-center">
                        <button class="btn btn-sm btn-light border btn-view-options" data-id="{{ $q->id }}">
                            <i class="bi bi-list-ul me-1"></i>{{ $q->options_count }}
                        </button>
                    </td>
                    
                    <td>
                        <div class="d-flex gap-1 justify-content-end">
                            <button class="btn btn-sm btn-outline-primary btn-edit-q" data-id="{{ $q->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger btn-delete-q"
                                    data-id="{{ $q->id }}"
                                    data-url="{{ route('admin.graded_exams.questions.destroy', $q->id) }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                        لا توجد أسئلة مطابقة للبحث.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-transparent border-0">{{ $questions->appends(request()->query())->links() }}</div>
</div>
</div>

<!-- Edit Question Modal (Form approach instead of inline due to complexity) -->
<div class="modal fade" id="editQuestionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">تعديل السؤال</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit-q-id">
                <div class="mb-3">
                    <label class="form-label small fw-medium">نص السؤال</label>
                    <textarea class="form-control" id="edit-q-text" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">التفسير / الشرح (اختياري)</label>
                    <textarea class="form-control text-muted" id="edit-q-explanation" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-medium">المستوى</label>
                        <select class="form-select" id="edit-q-level">
                            <option value="easy">سهل</option>
                            <option value="medium">متوسط</option>
                            <option value="hard">صعب</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-medium">نوع السؤال</label>
                        <select class="form-select" id="edit-q-type">
                            <option value="mcq">اختيار من متعدد</option>
                            <option value="true_false">صح / خطأ</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-edit">حفظ التغييرات</button>
            </div>
        </div>
    </div>
</div>

<!-- View Options Modal -->
<div class="modal fade" id="optionsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">خيارات الإجابة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="list-group list-group-flush" id="options-list">
                    <!-- Loaded via AJAX -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Question Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إضافة سؤال جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">الشهادة *</label>
                        <select class="form-select" id="add-q-exam_id">
                            <option value="">اختر الشهادة</option>
                            @foreach($exams as $e)
                                <option value="{{ $e->id }}">{{ $e->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">الوحدة *</label>
                        <select class="form-select" id="add-q-unit_id">
                            <option value="">اختر الوحدة</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">نص السؤال *</label>
                        <textarea class="form-control" id="add-q-text" rows="3" placeholder="اكتب نص السؤال هنا..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">التفسير / الشرح</label>
                        <textarea class="form-control" id="add-q-explanation" rows="2" placeholder="الشرح (اختياري)"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المستوى *</label>
                        <select class="form-select" id="add-q-level">
                            <option value="easy">سهل</option>
                            <option value="medium">متوسط</option>
                            <option value="hard">صعب</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">نوع السؤال *</label>
                        <select class="form-select" id="add-q-type">
                            <option value="mcq">اختيار من متعدد</option>
                            <option value="true_false">صح / خطأ</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 fw-semibold">خيارات الإجابة</h6>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-add-option">
                        <i class="bi bi-plus me-1"></i>إضافة خيار
                    </button>
                </div>
                <div id="add-options-container"></div>
                <div class="form-text mt-2 multi-correct-hint"><i class="bi bi-info-circle me-1"></i>يمكنك تحديد أكثر من خيار كإجابة صحيحة (سيتحول السؤال تلقائياً إلى سؤال متعدد الإجابات الصحيحة).</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-new-question">
                    <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ السؤال</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Dynamic units dropdown based on exam selection
$('#filter-exam').on('change', function() {
    const examId = $(this).val();
    const unitSelect = $('#filter-unit');
    
    $.get('{{ route('admin.graded_exams.units.byExam') }}', { graded_exam_id: examId }, function(units) {
        let opts = '<option value="">كل الوحدات</option>';
        units.forEach(u => {
            opts += `<option value="${u.id}">${u.title_ar}</option>`;
        });
        unitSelect.html(opts);
    });
});

// Per page select
$('#per-page-select').on('change', function() {
    $('#filter-per-page').val($(this).val());
    $('#filter-form').submit();
});

// View Options
$(document).on('click', '.btn-view-options', function() {
    const qId = $(this).data('id');
    const list = $('#options-list');
    list.html('<div class="p-4 text-center"><div class="spinner-border text-primary spinner-border-sm"></div></div>');
    
    const modal = new bootstrap.Modal(document.getElementById('optionsModal'));
    modal.show();
    
    $.get(`{{ url('admin/graded-exams/questions') }}/${qId}/options`, function(res) {
        if(res.success) {
            list.empty();
            if(res.options.length === 0) {
                list.html('<div class="p-3 text-center text-muted small">لا توجد خيارات</div>');
                return;
            }
            
            res.options.forEach(opt => {
                const icon = opt.is_correct ? '<i class="bi bi-check-circle-fill text-success fs-5"></i>' : '<i class="bi bi-circle text-muted"></i>';
                const bg = opt.is_correct ? 'bg-success bg-opacity-10' : '';
                
                list.append(`
                    <div class="list-group-item d-flex align-items-center gap-3 ${bg}">
                        ${icon}
                        <span class="${opt.is_correct ? 'fw-bold' : ''}">${opt.option_text_ar}</span>
                    </div>
                `);
            });
        }
    });
});

// Edit Question Modal
$(document).on('click', '.btn-edit-q', function() {
    const qId = $(this).data('id');
    const row = $(this).closest('tr');
    
    const text = row.find('.question-text-display').text().trim();
    let explanation = row.find('.full-explanation').text().trim();
    const level = row.find('.question-level').text().trim();
    const type = row.find('.question-type').text().trim();
    
    $('#edit-q-id').val(qId);
    $('#edit-q-text').val(text);
    $('#edit-q-explanation').val(explanation);
    $('#edit-q-level').val(level);
    $('#edit-q-type').val(type);
    
    new bootstrap.Modal(document.getElementById('editQuestionModal')).show();
});

// Save Edit
$('#btn-save-edit').on('click', function() {
    const qId = $('#edit-q-id').val();
    const text = $('#edit-q-text').val().trim();
    const explanation = $('#edit-q-explanation').val().trim();
    const level = $('#edit-q-level').val();
    const type = $('#edit-q-type').val();
    
    if(!text) {
        showAlert('نص السؤال مطلوب', 'warning');
        return;
    }
    
    const btn = $(this);
    setLoading(btn, true);
    
    $.ajax({
        url: `{{ url('admin/graded-exams/questions') }}/${qId}`,
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            text_ar: text,
            explanation_ar: explanation,
            level: level,
            question_type: type
        },
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance(document.getElementById('editQuestionModal')).hide();
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1000);
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert('حدث خطأ أثناء الحفظ', 'danger');
        }
    });
});

// Delete Question
$(document).on('click', '.btn-delete-q', function() {
    const url = $(this).data('url');
    confirmDelete('هل أنت متأكد من حذف هذا السؤال؟', url, () => location.reload());
});

// ------------- ADD QUESTION LOGIC -------------

// Dynamic units for Add modal
$('#add-q-exam_id').on('change', function() {
    const examId = $(this).val();
    const unitSelect = $('#add-q-unit_id');
    
    if (!examId) {
        unitSelect.html('<option value="">اختر الوحدة</option>');
        return;
    }
    
    $.get('{{ route('admin.graded_exams.units.byExam') }}', { graded_exam_id: examId }, function(units) {
        let opts = '<option value="">اختر الوحدة</option>';
        units.forEach(u => {
            opts += `<option value="${u.id}">${u.title_ar}</option>`;
        });
        unitSelect.html(opts);
    });
});

let optIndex = 0;
function addOptionRow(label='', isCorrect=false, isReadonly=false) {
    const checked = isCorrect ? 'checked' : '';
    const readonlyAttr = isReadonly ? 'readonly' : '';
    const removeBtnDisabled = isReadonly ? 'disabled' : '';
    
    $('#add-options-container').append(`
        <div class="row g-2 mb-2 add-opt-row">
            <div class="col-8">
                <input type="text" class="form-control form-control-sm add-opt-label" placeholder="نص الخيار" value="${label}" ${readonlyAttr}>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <div class="form-check m-0">
                    <input class="form-check-input add-opt-correct" type="checkbox" ${checked}>
                    <label class="form-check-label small ms-1">صحيح</label>
                </div>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-sm btn-outline-danger w-100 btn-remove-add-opt" ${removeBtnDisabled}>
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `);
}

function updateOptionsBasedOnType() {
    const type = $('#add-q-type').val();
    $('#add-options-container').empty();
    
    if (type === 'true_false') {
        $('#btn-add-option').hide();
        $('.multi-correct-hint').hide();
        
        // Add True / False specifically
        addOptionRow('صح', true, true);
        addOptionRow('خطأ', false, true);
        
        // Make sure only one can be checked for True/False
        $('.add-opt-correct').on('change', function() {
            if ($(this).is(':checked')) {
                $('.add-opt-correct').not(this).prop('checked', false);
            }
        });
        
    } else {
        $('#btn-add-option').show();
        $('.multi-correct-hint').show();
        
        addOptionRow('أ)', true);
        addOptionRow('ب)', false);
        addOptionRow('ج)', false);
        addOptionRow('د)', false);
    }
}

$('#add-q-type').on('change', updateOptionsBasedOnType);

$('#addQuestionModal').on('show.bs.modal', function() {
    $('#add-q-type').val('mcq'); // Default
    updateOptionsBasedOnType();
});

$('#btn-add-option').on('click', () => addOptionRow());

$(document).on('click', '.btn-remove-add-opt', function() {
    $(this).closest('.add-opt-row').remove();
});

$('#btn-save-new-question').on('click', function() {
    const payload = {
        graded_exam_id: $('#add-q-exam_id').val(),
        unit_id: $('#add-q-unit_id').val(),
        text_ar: $('#add-q-text').val().trim(),
        explanation_ar: $('#add-q-explanation').val().trim(),
        level: $('#add-q-level').val(),
        question_type: $('#add-q-type').val(),
        options: []
    };
    
    $('.add-opt-row').each(function() {
        const label = $(this).find('.add-opt-label').val().trim();
        const isCorrect = $(this).find('.add-opt-correct').is(':checked');
        if (label) {
            payload.options.push({ label_ar: label, is_correct: isCorrect });
        }
    });
    
    if (!payload.graded_exam_id || !payload.unit_id || !payload.text_ar) {
        showAlert('الرجاء تعبئة الشهادة، الوحدة، ونص السؤال.', 'warning');
        return;
    }
    
    if (payload.options.length < 2) {
        showAlert('يجب إدخال خيارين على الأقل.', 'warning');
        return;
    }
    
    if (!payload.options.some(opt => opt.is_correct)) {
        showAlert('يجب تحديد خيار واحد صحيح على الأقل.', 'warning');
        return;
    }
    
    const btn = $(this);
    setLoading(btn, true);
    
    $.ajax({
        url: '{{ route('admin.graded_exams.questions.store') }}',
        method: 'POST',
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance(document.getElementById('addQuestionModal')).hide();
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1000);
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء الإضافة', 'danger');
        }
    });
});
</script>
@endpush

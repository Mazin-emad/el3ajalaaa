@extends('layouts.admin')
@section('title', 'إنشاء اختبار جديد')
@section('page-title', 'إنشاء اختبار جديد')

@push('styles')
<style>
/* ── Layout ── */
.sidebar-card  { position:sticky; top:80px; border-radius:16px; border:0; box-shadow:0 4px 20px rgba(0,0,0,.08); }
.main-card     { border-radius:16px; border:0; box-shadow:0 4px 20px rgba(0,0,0,.08); }

/* ── Question pool ── */
.pool-scroll   { max-height:420px; overflow-y:auto; }
.q-pool-item {
    cursor:pointer; border:2px solid #e5e7eb; border-radius:10px;
    transition:all .15s; background:#fff; padding:.6rem .9rem;
}
.q-pool-item:hover  { border-color:#6366f1; background:#f5f3ff; }
.q-pool-item.selected { border-color:#6366f1; background:#ede9fe; }
.q-pool-item .q-num { font-size:.72rem; color:#6366f1; font-weight:700; }

/* ── Selected list ── */
.sel-item {
    background:#fff; border:1px solid #e5e7eb; border-radius:10px;
    padding:.5rem .75rem; display:flex; align-items:center; gap:.5rem;
}
.sel-item .drag-handle { color:#9ca3af; cursor:grab; }
.sel-num {
    width:24px; height:24px; border-radius:50%;
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff; font-size:.72rem; font-weight:700;
    display:flex; align-items:center; justify-content:center; flex-shrink:0;
}
#selected-list { min-height:80px; }

/* ── New question inline ── */
.option-row { background:#f9fafb; border-radius:8px; padding:.5rem; }

/* ── Reversed badge ── */
.rev-label {
    background:#fef3c7; border:1px solid #fcd34d; border-radius:6px;
    color:#92400e; font-size:.72rem; padding:.15rem .5rem;
}

/* ── Tab styling ── */
.nav-pills .nav-link { border-radius:50px; font-size:.85rem; font-weight:600; color:#6b7280; }
.nav-pills .nav-link.active {
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff; box-shadow:0 2px 8px rgba(99,102,241,.35);
}

/* ── Save button ── */
.btn-save-main {
    border:0; border-radius:50px; padding:.65rem 2rem; font-weight:700;
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff; width:100%;
    box-shadow:0 4px 16px rgba(99,102,241,.35); transition:all .2s;
}
.btn-save-main:hover { transform:translateY(-1px); box-shadow:0 6px 20px rgba(99,102,241,.45); color:#fff; }

/* ── Category dropdown ── */
.category-presets { display:flex; flex-wrap:wrap; gap:.4rem; margin-top:.4rem; }
.preset-chip {
    background:#f3f4f6; border:1px solid #e5e7eb; border-radius:50px;
    font-size:.72rem; padding:.2rem .7rem; cursor:pointer; transition:all .15s;
}
.preset-chip:hover { background:#ede9fe; border-color:#6366f1; color:#6366f1; }
</style>
@endpush

@section('content')
<div class="row g-4">

    {{-- ─── LEFT: Assessment info ─────────────────────────────── --}}
    <div class="col-lg-4">
        <div class="card sidebar-card">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-4">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i>بيانات المقياس
                </h6>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">اسم المقياس *</label>
                    <input type="text" class="form-control" id="e-title_ar"
                           placeholder="مثال: مقياس معرفة الذات">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">المجال / الفئة *</label>
                    <input type="text" class="form-control" id="e-category"
                           placeholder="اختر أو اكتب...">
                    <div class="category-presets">
                        @foreach([
                            'مقاييس معرفة الذات والشخصية',
                            'مقاييس الكفاءة الشخصية والنجاح المهني',
                            'مقاييس الاتصال والعلاقات المهنية',
                            'مقاييس القيادة والإدارة',
                            'مقاييس التوجيه والتوافق المهني',
                            'مقاييس الصحة المهنية',
                        ] as $cat)
                        <span class="preset-chip" data-cat="{{ $cat }}">{{ $cat }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">وصف المقياس</label>
                    <textarea class="form-control" id="e-description_ar" rows="3"
                              placeholder="اكتب وصفاً موجزاً للمقياس وهدفه..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-semibold">الوقت المحدد (دقائق)</label>
                    <input type="number" class="form-control" id="e-time_limit_min"
                           placeholder="فارغ = بلا حد زمني" min="1">
                </div>

                <hr>

                {{-- Selected summary --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="small fw-semibold text-muted">الأسئلة المختارة</span>
                    <span class="badge rounded-pill" style="background:linear-gradient(135deg,#6366f1,#8b5cf6)"
                          id="selected-count">0</span>
                </div>

                <div id="selected-list" class="d-flex flex-column gap-2 mb-4">
                    <div class="text-center text-muted small py-3 empty-msg">
                        <i class="bi bi-arrow-left-circle fs-5 d-block mb-1"></i>
                        أضف أسئلة من القسم المجاور
                    </div>
                </div>

                <button class="btn-save-main btn" id="btn-save-exam">
                    <span class="btn-text"><i class="bi bi-save2 me-1"></i>حفظ المقياس</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>

    {{-- ─── RIGHT: Question sources ─────────────────────────── --}}
    <div class="col-lg-8">
        <div class="card main-card">
            <div class="card-body p-4">

                {{-- Tabs --}}
                <ul class="nav nav-pills mb-4 gap-2" id="source-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" data-tab="bank">
                            <i class="bi bi-database me-1"></i>بنك الأسئلة
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-tab="new">
                            <i class="bi bi-plus-circle me-1"></i>سؤال جديد
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-tab="bulk">
                            <i class="bi bi-file-text me-1"></i>استيراد نصي
                        </button>
                    </li>
                </ul>

                {{-- ── Tab 1: Question Bank ── --}}
                <div id="tab-bank">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">فلتر بالمقياس</label>
                            <select class="form-select form-select-sm" id="pool-assessment-filter">
                                <option value="">— كل المقاييس —</option>
                                @foreach($assessments as $a)
                                    <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">بحث في النص</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control" id="pool-search"
                                       placeholder="اكتب للبحث...">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small text-muted" id="pool-count">اختر مقياساً أو ابحث</span>
                        <button class="btn btn-sm btn-outline-primary rounded-pill" id="btn-select-all" style="display:none">
                            تحديد الكل
                        </button>
                    </div>

                    <div class="pool-scroll" id="questions-pool">
                        <div class="text-center text-muted py-5">
                            <i class="bi bi-database fs-2 d-block mb-2 opacity-25"></i>
                            اختر مقياساً أو ابحث لعرض الأسئلة
                        </div>
                    </div>
                </div>

                {{-- ── Tab 2: New Question Inline ── --}}
                <div id="tab-new" class="d-none">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">نص السؤال *</label>
                        <textarea class="form-control" id="new-q-text" rows="3"
                                  placeholder="اكتب نص السؤال هنا..."></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">المقياس *</label>
                            <select class="form-select form-select-sm" id="new-q-assessment">
                                <option value="">— اختر المقياس —</option>
                                @foreach($assessments as $a)
                                    <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">البُعد</label>
                            <select class="form-select form-select-sm" id="new-q-dimension">
                                <option value="">— بدون بُعد —</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="new-q-reversed">
                        <label class="form-check-label small" for="new-q-reversed">
                            سؤال معكوس
                            <span class="rev-label ms-1">نعم=0 | لا=2</span>
                        </label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">خيارات الإجابة</label>
                        <div class="d-flex flex-column gap-2" id="new-options-container">
                            <div class="option-row d-flex gap-2 align-items-center">
                                <span class="badge bg-success-subtle text-success border border-success-subtle small">نعم</span>
                                <input type="number" class="form-control form-control-sm w-25" value="2" data-score-label="نعم" id="opt-score-0" placeholder="الدرجة">
                            </div>
                            <div class="option-row d-flex gap-2 align-items-center">
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle small">إلى حد ما</span>
                                <input type="number" class="form-control form-control-sm w-25" value="1" data-score-label="إلى حد ما" id="opt-score-1" placeholder="الدرجة">
                            </div>
                            <div class="option-row d-flex gap-2 align-items-center">
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle small">لا</span>
                                <input type="number" class="form-control form-control-sm w-25" value="0" data-score-label="لا" id="opt-score-2" placeholder="الدرجة">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-outline-primary rounded-pill px-4" id="btn-add-new-q">
                        <i class="bi bi-plus-circle me-1"></i>إضافة وتأكيد السؤال
                    </button>
                    <div id="new-q-feedback" class="mt-2"></div>
                </div>

                {{-- ── Tab 3: Bulk Text Import ── --}}
                <div id="tab-bulk" class="d-none">
                    <div class="alert alert-info small py-2 mb-3">
                        <i class="bi bi-lightbulb me-1"></i>
                        اكتب كل سؤال في سطر منفصل. ستُضاف تلقائياً بخيارات (نعم=2 / إلى حد ما=1 / لا=0).
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">المقياس *</label>
                            <select class="form-select form-select-sm" id="bulk-assessment">
                                <option value="">— اختر المقياس —</option>
                                @foreach($assessments as $a)
                                    <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">البُعد</label>
                            <select class="form-select form-select-sm" id="bulk-dimension">
                                <option value="">— بدون بُعد —</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">الأسئلة (سطر لكل سؤال)</label>
                        <textarea class="form-control" id="bulk-text" rows="10"
                                  dir="rtl"
                                  placeholder="أعرف نقاط قوتي بوضوح.&#10;أستطيع تحديد نقاط الضعف التي أحتاج إلى تطويرها.&#10;أفهم الأسباب التي تدفعني لاتخاذ قراراتي."></textarea>
                    </div>

                    <button class="btn btn-outline-success rounded-pill px-4" id="btn-bulk-import">
                        <span class="btn-text"><i class="bi bi-cloud-upload me-1"></i>استيراد وإضافة للاختبار</span>
                        <span class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                    <div id="bulk-feedback" class="mt-2"></div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
/* ═══════════════════════════════════════════
   State
═══════════════════════════════════════════ */
let allPoolQuestions = [];
let selectedIds  = [];   // question IDs picked from bank
let inlineQs     = [];   // questions created inline (not yet in DB)

const CSRF = $('meta[name="csrf-token"]').attr('content');

/* ═══════════════════════════════════════════
   Tabs
═══════════════════════════════════════════ */
$('[data-tab]').on('click', function () {
    $('[data-tab]').removeClass('active');
    $(this).addClass('active');
    $('#tab-bank, #tab-new, #tab-bulk').addClass('d-none');
    $(`#tab-${$(this).data('tab')}`).removeClass('d-none');
});

/* ═══════════════════════════════════════════
   Category presets
═══════════════════════════════════════════ */
$(document).on('click', '.preset-chip', function () {
    $('#e-category').val($(this).data('cat'));
});

/* ═══════════════════════════════════════════
   TAB 1 — Question Bank
═══════════════════════════════════════════ */
function loadPool() {
    const assessmentId = $('#pool-assessment-filter').val();
    const search = $('#pool-search').val().trim();

    if (!assessmentId && !search) {
        $('#questions-pool').html('<div class="text-center text-muted py-5"><i class="bi bi-database fs-2 d-block mb-2 opacity-25"></i>اختر مقياساً أو ابحث لعرض الأسئلة</div>');
        $('#pool-count').text('اختر مقياساً أو ابحث');
        $('#btn-select-all').hide();
        return;
    }

    $('#questions-pool').html('<div class="text-center py-4"><div class="spinner-border text-primary"></div></div>');

    let url = '{{ route("admin.questions.index") }}?per_page=all';
    if (assessmentId) url += `&assessment_id=${assessmentId}`;
    if (search)       url += `&search=${encodeURIComponent(search)}`;

    $.get(url, null, null, 'html').fail(function () {
        // fallback: load JSON via by-assessment
        if (assessmentId) {
            $.get(`{{ url('admin/questions/by-assessment') }}/${assessmentId}`, function (data) {
                allPoolQuestions = data;
                const filtered = search ? data.filter(q => q.text_ar.includes(search)) : data;
                renderPool(filtered);
            });
        }
    });

    // Direct JSON endpoint (by-assessment is JSON)
    if (assessmentId) {
        $.get(`{{ url('admin/questions/by-assessment') }}/${assessmentId}`, function (data) {
            allPoolQuestions = data;
            const filtered = search ? data.filter(q => q.text_ar.includes(search)) : data;
            renderPool(filtered);
        });
    }
}

$('#pool-assessment-filter').on('change', loadPool);
$('#pool-search').on('input', function () {
    if ($('#pool-assessment-filter').val()) {
        const q = $(this).val().trim();
        renderPool(q ? allPoolQuestions.filter(x => x.text_ar.includes(q)) : allPoolQuestions);
    } else {
        loadPool();
    }
});

function renderPool(questions) {
    if (!questions.length) {
        $('#questions-pool').html('<div class="text-center text-muted py-5"><i class="bi bi-search fs-2 d-block mb-2 opacity-25"></i>لا توجد أسئلة مطابقة</div>');
        $('#pool-count').text('0 سؤال');
        $('#btn-select-all').hide();
        return;
    }

    $('#pool-count').text(`${questions.length} سؤال`);
    $('#btn-select-all').show();

    let html = '';
    questions.forEach((q, i) => {
        const sel = selectedIds.includes(q.id);
        const rev = q.is_reversed ? '<span class="rev-label ms-1">معكوس</span>' : '';
        html += `<div class="q-pool-item mb-2 ${sel ? 'selected' : ''}" data-id="${q.id}" data-text="${q.text_ar.replace(/"/g,'&quot;')}">
            <div class="d-flex align-items-start gap-2">
                <i class="bi ${sel ? 'bi-check-circle-fill text-primary' : 'bi-circle text-muted'} mt-1 flex-shrink-0 pool-icon"></i>
                <div class="flex-grow-1">
                    <div class="q-num">سؤال ${i+1}${rev}</div>
                    <div class="small mt-1">${q.text_ar}</div>
                </div>
            </div>
        </div>`;
    });
    $('#questions-pool').html(html);
}

// Select all visible
$('#btn-select-all').on('click', function () {
    $('.q-pool-item').each(function () {
        const id   = $(this).data('id');
        const text = $(this).data('text');
        if (!selectedIds.includes(id)) addSelected(id, text);
    });
    syncPool();
});

$(document).on('click', '.q-pool-item', function () {
    const id = $(this).data('id'), text = $(this).data('text');
    selectedIds.includes(id) ? removeSelected(id) : addSelected(id, text);
    syncPool();
});

function syncPool() {
    $('.q-pool-item').each(function () {
        const sel = selectedIds.includes($(this).data('id'));
        $(this).toggleClass('selected', sel);
        $(this).find('.pool-icon').attr('class', `bi ${sel ? 'bi-check-circle-fill text-primary' : 'bi-circle text-muted'} mt-1 flex-shrink-0 pool-icon`);
    });
}

/* ═══════════════════════════════════════════
   TAB 2 — Dimension loader for new Q
═══════════════════════════════════════════ */
function loadDimensions(assessmentId, targetSelect) {
    $(targetSelect).html('<option value="">— جاري التحميل —</option>');
    if (!assessmentId) { $(targetSelect).html('<option value="">— بدون بُعد —</option>'); return; }
    $.get(`{{ url('admin/dimensions/by-assessment') }}/${assessmentId}`, function (data) {
        let opts = '<option value="">— بدون بُعد —</option>';
        data.forEach(d => { opts += `<option value="${d.id}">${d.name_ar}</option>`; });
        $(targetSelect).html(opts);
    });
}

$('#new-q-assessment').on('change', function () { loadDimensions($(this).val(), '#new-q-dimension'); });
$('#bulk-assessment').on('change', function () { loadDimensions($(this).val(), '#bulk-dimension'); });

/* ── Add inline question ── */
$('#btn-add-new-q').on('click', function () {
    const text       = $('#new-q-text').val().trim();
    const assessmentId = $('#new-q-assessment').val();
    const dimensionId  = $('#new-q-dimension').val();
    const isReversed   = $('#new-q-reversed').is(':checked');
    const options = [
        { label_ar: 'نعم',        score_value: parseInt($('#opt-score-0').val()), order_index: 0 },
        { label_ar: 'إلى حد ما', score_value: parseInt($('#opt-score-1').val()), order_index: 1 },
        { label_ar: 'لا',         score_value: parseInt($('#opt-score-2').val()), order_index: 2 },
    ];

    if (!text)         { $('#new-q-feedback').html('<div class="alert alert-warning py-2 small">اكتب نص السؤال.</div>'); return; }
    if (!assessmentId) { $('#new-q-feedback').html('<div class="alert alert-warning py-2 small">اختر المقياس.</div>'); return; }

    const btn = $(this);
    btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> جاري الحفظ...');

    $.ajax({
        url: '{{ route("admin.questions.store") }}', method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': CSRF },
        data: JSON.stringify({ assessment_id: assessmentId, dimension_id: dimensionId || null,
                               text_ar: text, is_reversed: isReversed, options }),
        success(res) {
            btn.prop('disabled', false).html('<i class="bi bi-plus-circle me-1"></i>إضافة وتأكيد السؤال');
            $('#new-q-feedback').html(`<div class="alert alert-success py-2 small"><i class="bi bi-check-circle me-1"></i>تم حفظ السؤال وإضافته للقائمة.</div>`);
            addSelected(res.id, text);
            $('#new-q-text').val('');
            $('#new-q-reversed').prop('checked', false);
        },
        error(xhr) {
            btn.prop('disabled', false).html('<i class="bi bi-plus-circle me-1"></i>إضافة وتأكيد السؤال');
            const msg = xhr.responseJSON?.message || 'حدث خطأ.';
            $('#new-q-feedback').html(`<div class="alert alert-danger py-2 small">${msg}</div>`);
        }
    });
});

/* ═══════════════════════════════════════════
   TAB 3 — Bulk Import
═══════════════════════════════════════════ */
$('#btn-bulk-import').on('click', function () {
    const assessmentId  = $('#bulk-assessment').val();
    const dimensionId   = $('#bulk-dimension').val();
    const questionsText = $('#bulk-text').val().trim();

    if (!assessmentId)  { showAlert('اختر المقياس أولاً.', 'warning'); return; }
    if (!questionsText) { showAlert('اكتب الأسئلة أولاً.', 'warning'); return; }

    const btn = $(this);
    setLoading(btn, true);

    $.ajax({
        url: '{{ route("admin.questions.bulk") }}', method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': CSRF },
        data: JSON.stringify({ assessment_id: assessmentId, dimension_id: dimensionId || null,
                               questions_text: questionsText }),
        success(res) {
            setLoading(btn, false);
            $('#bulk-feedback').html(`<div class="alert alert-success py-2 small"><i class="bi bi-check-circle me-1"></i>${res.message}</div>`);
            $('#bulk-text').val('');
            // Reload pool from this assessment
            $('#pool-assessment-filter').val(assessmentId).trigger('change');
            $('[data-tab="bank"]').trigger('click');
        },
        error(xhr) {
            setLoading(btn, false);
            $('#bulk-feedback').html(`<div class="alert alert-danger py-2 small">${xhr.responseJSON?.message || 'حدث خطأ.'}</div>`);
        }
    });
});

/* ═══════════════════════════════════════════
   Selected list management
═══════════════════════════════════════════ */
function addSelected(id, text) {
    if (selectedIds.includes(id)) return;
    selectedIds.push(id);
    $('.empty-msg').remove();
    const n = selectedIds.length;
    $('#selected-list').append(
        `<div class="sel-item" data-id="${id}">
            <i class="bi bi-grip-vertical drag-handle"></i>
            <span class="sel-num">${n}</span>
            <span class="small flex-grow-1 text-truncate" style="max-width:200px" title="${text}">${text}</span>
            <button type="button" class="btn btn-sm btn-link text-danger p-0 btn-remove-sel flex-shrink-0">
                <i class="bi bi-x-circle"></i>
            </button>
        </div>`
    );
    updateCount();
}

function removeSelected(id) {
    selectedIds = selectedIds.filter(x => x !== id);
    $(`#selected-list .sel-item[data-id="${id}"]`).remove();
    if (!selectedIds.length) $('#selected-list').html('<div class="text-center text-muted small py-3 empty-msg"><i class="bi bi-arrow-left-circle fs-5 d-block mb-1"></i>أضف أسئلة من القسم المجاور</div>');
    renumberSelected();
    updateCount();
}

function renumberSelected() {
    $('#selected-list .sel-num').each(function (i) { $(this).text(i+1); });
}

$(document).on('click', '.btn-remove-sel', function () {
    const id = $(this).closest('.sel-item').data('id');
    removeSelected(id); syncPool();
});

function updateCount() { $('#selected-count').text(selectedIds.length); }

// Sortable for selected
new Sortable(document.getElementById('selected-list'), {
    handle: '.drag-handle', animation: 150,
    onEnd() {
        const order = [];
        $('#selected-list .sel-item').each(function () { order.push($(this).data('id')); });
        selectedIds = order;
        renumberSelected();
    }
});

/* ═══════════════════════════════════════════
   Save exam
═══════════════════════════════════════════ */
$('#btn-save-exam').on('click', function () {
    const btn = $(this);
    if (!selectedIds.length) { showAlert('أضف على الأقل سؤالاً واحداً.', 'warning'); return; }

    const payload = {
        title_ar:       $('#e-title_ar').val().trim(),
        category:       $('#e-category').val().trim(),
        description_ar: $('#e-description_ar').val().trim(),
        time_limit_min: $('#e-time_limit_min').val() || null,
        question_ids:   selectedIds,
        dimensions:     [],
    };

    if (!payload.title_ar || !payload.category) { showAlert('اسم المقياس والمجال مطلوبان.', 'warning'); return; }

    setLoading(btn, true);
    $.ajax({
        url: '{{ route("admin.exams.store") }}', method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': CSRF },
        data: JSON.stringify(payload),
        success(res) {
            setLoading(btn, false);
            showAlert(res.message, 'success');
            setTimeout(() => window.location.href = '{{ route("admin.assessments.index") }}', 1200);
        },
        error(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});
</script>
@endpush

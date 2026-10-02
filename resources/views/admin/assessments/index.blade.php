@extends('layouts.admin')
@section('title', 'إدارة المقاييس')
@section('page-title', 'إدارة المقاييس')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="text-muted small">إجمالي: {{ $assessments->total() }} مقياس</div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assessmentModal">
        <i class="bi bi-plus-circle me-1"></i>إضافة مقياس جديد
    </button>
</div>

<!-- Filter Section -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="{{ route('admin.assessments.index') }}" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label small fw-semibold text-muted">البحث</label>
                <input type="text" name="search" class="form-control form-control-sm" placeholder="ابحث باسم المقياس..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold text-muted">تصفية حسب المحور</label>
                <select name="category" class="form-select form-select-sm">
                    <option value="">جميع المحاور</option>
                    <option value="مقاييس التوجيه والتوافق المهني" {{ request('category') == 'مقاييس التوجيه والتوافق المهني' ? 'selected' : '' }}>مقاييس التوجيه والتوافق المهني</option>
                    <option value="الذات والشحصيه" {{ request('category') == 'الذات والشحصيه' ? 'selected' : '' }}>الذات والشخصية</option>
                    <option value="الكفاءة الشخصية والنجاح المهني" {{ request('category') == 'الكفاءة الشخصية والنجاح المهني' ? 'selected' : '' }}>الكفاءة الشخصية والنجاح المهني</option>
                    <option value="مقاييس الاتصال والعلاقات المهنية" {{ request('category') == 'مقاييس الاتصال والعلاقات المهنية' ? 'selected' : '' }}>مقاييس الاتصال والعلاقات المهنية</option>
                    <option value="مقاييس الصحةاملهنية" {{ request('category') == 'مقاييس الصحةاملهنية' ? 'selected' : '' }}>مقاييس الصحة المهنية</option>
                    <option value="مقاييس القيادة والإدارة" {{ request('category') == 'مقاييس القيادة والإدارة' ? 'selected' : '' }}>مقاييس القيادة والإدارة</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-sm px-4">تصفية</button>
                @if(request('search') || request('category'))
                    <a href="{{ route('admin.assessments.index') }}" class="btn btn-outline-secondary btn-sm ms-2">إلغاء</a>
                @endif
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>اسم المقياس</th>
                    <th>المحور</th>
                    <th>الأبعاد</th>
                    <th>الأسئلة</th>
                    <th>الوقت</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody id="assessments-tbody">
                @forelse($assessments as $a)
                <tr data-id="{{ $a->id }}">
                    <td class="fw-medium">{{ $a->title_ar }}</td>
                    <td class="text-muted small">{{ $a->category }}</td>
                    <td>{{ $a->dimensions_count }}</td>
                    <td>{{ $a->questions_count }}</td>
                    <td>{{ $a->time_limit_min ? $a->time_limit_min.' د' : 'بلا حد' }}</td>
                    <td>
                        @if($a->is_active)
                            <span class="badge bg-success-subtle text-success border border-success-subtle">مفعّل</span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">موقوف</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-outline-secondary btn-toggle"
                                    data-id="{{ $a->id }}"
                                    data-url="{{ route('admin.assessments.toggle', $a->id) }}"
                                    title="{{ $a->is_active ? 'إيقاف' : 'تفعيل' }}">
                                <i class="bi {{ $a->is_active ? 'bi-pause-circle' : 'bi-play-circle' }}"></i>
                            </button>
                            <a href="{{ route('admin.assessments.show', $a->id) }}"
                                class="btn btn-sm btn-outline-primary" title="عرض وتعديل المقياس">
                                <i class="bi bi-list-ul"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-danger btn-delete"
                                    data-id="{{ $a->id }}"
                                    data-url="{{ route('admin.assessments.destroy', $a->id) }}"
                                    data-name="{{ $a->title_ar }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">لا توجد مقاييس بعد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-transparent border-0">
        {{ $assessments->links() }}
    </div>
</div>

<!-- Assessment Modal -->
<div class="modal fade" id="assessmentModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إضافة مقياس جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="assessment-form-errors" class="alert alert-danger d-none"></div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">اسم المقياس *</label>
                        <input type="text" class="form-control" id="f-title_ar" placeholder="مثال: مقياس معرفة الذات">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">العنوان الجذاب (وصف قصير)</label>
                        <input type="text" class="form-control" id="f-subtitle_ar" placeholder="مثال: افهم ذاتك بعمق واكتشف نقاط قوتك">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label small fw-medium">المحور / الفئة *</label>
                        <input type="text" class="form-control" id="f-category"
                               list="category-datalist"
                               placeholder="اختر من القائمة أو اكتب مجالاً جديداً">
                        <datalist id="category-datalist">
                            <option value="مقاييس معرفة الذات والشخصية">
                            <option value="مقاييس الكفاءة الشخصية والنجاح المهني">
                            <option value="مقاييس الاتصال والعلاقات المهنية">
                            <option value="مقاييس القيادة والإدارة">
                            <option value="مقاييس التوجيه والتوافق المهني">
                            <option value="مقاييس الصحة المهنية">
                        </datalist>
                        <div class="d-flex flex-wrap gap-1 mt-2">
                            @foreach([
                                'مقاييس معرفة الذات والشخصية',
                                'مقاييس الكفاءة الشخصية والنجاح المهني',
                                'مقاييس الاتصال والعلاقات المهنية',
                                'مقاييس القيادة والإدارة',
                                'مقاييس التوجيه والتوافق المهني',
                                'مقاييس الصحة المهنية',
                            ] as $cat)
                            <span class="badge bg-light text-muted border small py-1 px-2"
                                  style="cursor:pointer"
                                  onclick="document.getElementById('f-category').value='{{ $cat }}'">
                                {{ $cat }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الوصف</label>
                        <textarea class="form-control" id="f-description_ar" rows="2"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">صورة المقياس</label>
                        <input type="file" class="form-control" id="f-image" accept="image/*">
                        <div class="form-text" style="font-size:0.65rem;">اختياري: سيتم عرض صورة افتراضية إن لم تقم برفع صورة.</div>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">وقت الاختبار (دقائق)</label>
                        <input type="number" class="form-control" id="f-time_limit_min" placeholder="بلا حد" min="1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">سعر المقياس (ر.س)</label>
                        <input type="number" class="form-control" id="f-price" placeholder="مثال: 149" step="0.01" min="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">التقييم الابتدائي (1-5)</label>
                        <input type="number" class="form-control" id="f-rating" placeholder="مثال: 4.8" step="0.1" min="1" max="5">
                    </div>
                    <div class="col-12"><hr class="my-2"></div>
                    <div class="col-12 text-primary fw-bold mb-0">بيانات التقرير المتقدمة (اختياري)</div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">الشهادات الاحترافية المناسبة</label>
                        <textarea class="form-control" id="f-certificates_ar" rows="2" placeholder="شهادة 1، شهادة 2..."></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">البرامج التدريبية المقترحة</label>
                        <textarea class="form-control" id="f-programs_ar" rows="2" placeholder="دورة 1، دورة 2..."></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">خطة تطوير (30 يوماً)</label>
                        <textarea class="form-control" id="f-plan_30_days_ar" rows="2" placeholder="الأسبوع 1: ..."></textarea>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-semibold mb-0">الأبعاد الفرعية</h6>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="btn-add-dimension">
                        <i class="bi bi-plus-circle me-1"></i>إضافة بُعد
                    </button>
                </div>
                <div id="dimensions-container"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-assessment">
                    <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ المقياس</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let dimIndex = 0;

function addDimensionRow(name='', max='') {
    const idx = dimIndex++;
    $('#dimensions-container').append(`
        <div class="row g-2 mb-2 dim-row" data-index="${idx}">
            <div class="col-7">
                <input type="text" class="form-control form-control-sm" placeholder="اسم البُعد مثلاً: الوعي بالذات"
                    name="dim_name_${idx}" value="${name}">
            </div>
            <div class="col-3">
                <input type="number" class="form-control form-control-sm" placeholder="الدرجة القصوى"
                    name="dim_max_${idx}" value="${max}" min="1">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-sm btn-outline-danger w-100 btn-remove-dim">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `);
}

// Init with one empty row
addDimensionRow();

$('#btn-add-dimension').on('click', () => addDimensionRow());

$(document).on('click', '.btn-remove-dim', function() {
    $(this).closest('.dim-row').remove();
});

$('#btn-save-assessment').on('click', function() {
    const btn = $(this);
    const dims = [];
    let valid = true;

    $('.dim-row').each(function() {
        const idx = $(this).data('index');
        const name = $(this).find(`[name=dim_name_${idx}]`).val().trim();
        const max  = parseInt($(this).find(`[name=dim_max_${idx}]`).val());
        if (name && max > 0) {
            dims.push({ name_ar: name, max_score: max });
        } else if (name || !isNaN(max)) {
            valid = false;
        }
    });

    if (!valid) {
        showAlert('تأكد من ملء جميع بيانات الأبعاد بشكل صحيح.', 'warning');
        return;
    }

    if (!$('#f-title_ar').val().trim() || !$('#f-category').val().trim()) {
        showAlert('اسم المقياس والمحور مطلوبان.', 'warning');
        return;
    }

    const formData = new FormData();
    formData.append('title_ar', $('#f-title_ar').val().trim());
    formData.append('subtitle_ar', $('#f-subtitle_ar').val().trim());
    formData.append('category', $('#f-category').val().trim());
    
    if ($('#f-description_ar').val().trim()) formData.append('description_ar', $('#f-description_ar').val().trim());
    if ($('#f-time_limit_min').val()) formData.append('time_limit_min', $('#f-time_limit_min').val());
    if ($('#f-price').val()) formData.append('price', $('#f-price').val());
    if ($('#f-rating').val()) formData.append('rating', $('#f-rating').val());
    if ($('#f-certificates_ar').val().trim()) formData.append('certificates_ar', $('#f-certificates_ar').val().trim());
    if ($('#f-programs_ar').val().trim()) formData.append('programs_ar', $('#f-programs_ar').val().trim());
    if ($('#f-plan_30_days_ar').val().trim()) formData.append('plan_30_days_ar', $('#f-plan_30_days_ar').val().trim());
    
    if ($('#f-image')[0].files.length > 0) {
        formData.append('image', $('#f-image')[0].files[0]);
    }

    dims.forEach((d, i) => {
        formData.append(`dimensions[${i}][name_ar]`, d.name_ar);
        formData.append(`dimensions[${i}][max_score]`, d.max_score);
    });

    setLoading(btn, true);
    $.ajax({
        url: '{{ route('admin.assessments.store') }}',
        method: 'POST',
        processData: false,
        contentType: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: formData,
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance($('#assessmentModal')).hide();
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1200);
        },
        error: function(xhr) {
            setLoading(btn, false);
            const msg = xhr.responseJSON?.message || 'حدث خطأ، حاول مرة أخرى.';
            showAlert(msg, 'danger');
        }
    });
});

// Toggle active
$(document).on('click', '.btn-toggle', function() {
    const btn = $(this);
    const url = btn.data('url');
    $.ajax({
        url: url, method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 800);
        }
    });
});

// Delete
$(document).on('click', '.btn-delete', function() {
    const url  = $(this).data('url');
    const name = $(this).data('name');
    confirmDelete(`هل تريد حذف مقياس "${name}"؟ سيتم حذف كل الأسئلة والجلسات المرتبطة به.`, url, () => {
        location.reload();
    });
});
</script>
@endpush
